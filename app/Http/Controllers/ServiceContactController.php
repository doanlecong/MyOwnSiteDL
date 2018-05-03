<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MailServiceContact;
use App\MyServiceContact;
use App\MyServiceFile;
use App\MyUserContactInfo;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;
class ServiceContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $serviceName = ConfigData::getArrayService();
        $arrImage = ConfigData::getArrTypeImage();
        $myServiceContact = MyServiceContact::with('serviceFile')->paginate(10);
        return view('layouts.admin.service_contact.index')
            ->withArrImage($arrImage)
            ->withServiceName($serviceName)
            ->withMyServiceContact($myServiceContact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $isOK = MyUserContactInfo::checkThresholdRequest($request);
            if(!$isOK) {
                return response()->json([
                    'success' => false,
                    'msg' => " Bạn ơi ! Đừng Phá Nữa! Một ngày làm gì mà vào trang mình mà request lắm thế !"
                ],400);
            }

            $validate = Validator::make($request->all(),[
                'name_nguoi' => 'required|max:255',
                'email' => 'required|email',
                'dich_vu' => 'required|present|in:1,2,3',
                'content_dichvu' => 'required',
                'file_mota' => 'sometimes|file|max:3072',
                'link_external' => 'present'
            ]);

            if(!$validate->fails()) {
                $myServiceContact = new MyServiceContact();
                $myServiceContact->name = $request->name_nguoi;
                $myServiceContact->email = $request->email;
                $myServiceContact->service_name = $request->dich_vu;
                $myServiceContact->service_description = $request->content_dichvu;
                $myServiceContact->is_read = 'N';
                $myServiceContact->is_reply = 'N';
                $myServiceContact->save();

                if($request->hasFile('file_mota')) {
                    $file = $request->file('file_mota');
                    $link_external = !empty($request->link_external) ? $request->link_external : ConfigData::$nullValueForString;
                    MyServiceFile::addNew($file->getClientOriginalName(),
                        $file->getSize(),
                        $file->getClientOriginalExtension(),
                        $myServiceContact->id,
                        'storage/app',
                        $link_external);
                    Storage::disk('local')->put($file->getClientOriginalName(),File::get($file));
                }
                MyUserContactInfo::addNew($request);
                return response()->json([
                    'success' => true,
                    'msg' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
                //            Session::flash('success','Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất');
//            return redirect()->route('dichvu');
            }
            MyUserContactInfo::addNew($request);
            return response()->json([
                'success' => false,
                'msg' => "Something went wrong! Please try again later ."
            ],500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => $e,
            ],500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceContact = MyServiceContact::with('serviceFile')->find($id);
        $serviceContact->is_read = 'Y';
        $serviceContact->save();
        $arrDichVu = ConfigData::getArrayService();
        $arrImageType = ConfigData::getArrTypeImage();
        return view('layouts.admin.service_contact.show')
            ->withArrDichVu($arrDichVu)
            ->withArrImageType($arrImageType)
            ->withServiceContact($serviceContact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Reply email from customer requirements
     */
    public function reply($id) {
        $arrService = ConfigData::getArrayService();
        $serviceContact = MyServiceContact::with('mailService')->find($id);
        return view('layouts.admin.service_contact.mail')
            ->withArrService($arrService)
            ->withServiceContact($serviceContact);
    }

    public function saveMail(Request $request, $id) {
//        return $request;
//        return (new Response($request->ce,200))->header('Content-Type', ConfigData::getContentTypeResponseBaseFileType('html'));
        $serviceContact = MyServiceContact::find($id);
        $serviceContact->is_reply = "Y";
        $serviceContact->save();
        if($serviceContact->mailService) {
            $oldMail = $serviceContact->mailService;
            $oldMail->my_service_contacts_id = $id;
            $oldMail->file_attach = $request->fileAttach;
            $oldMail->title = $request->title;
            $oldMail->email = $request->email;
            $oldMail->content = $request->contentEmail;
            $oldMail->save();
        } else {
            $newMailService = new MailServiceContact();
            $newMailService->my_service_contacts_id = $id;
            $newMailService->file_attach = $request->fileAttach;
            $newMailService->title = $request->title;
            $newMailService->email = $request->email;
            $newMailService->content = $request->contentEmail;
            $newMailService->save();
        }

        return redirect()->route('dichvu.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
