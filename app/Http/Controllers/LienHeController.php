<?php

namespace App\Http\Controllers;

use App\MyContact;
use App\MyUserContactInfo;
use Illuminate\Http\Request;
use Validator;
use Purifier;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myContacts = MyContact::orderBy('created_at', 'desc')->paginate(20);
        return view('layouts.admin.lienhe.index')->withMyContacts($myContacts);
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
                'contentlienhe' => 'required',
            ]);
            if(!$validate->fails()) {
                $newContact = new MyContact();
                $newContact->name = $request->name_nguoi;
                $newContact->email = $request->email;
                $newContact->content = Purifier::clean($request->contentlienhe);

                $newContact->save();
                MyUserContactInfo::addNew($request);

                return response()->json([
                    'success' => true,
                    'msg' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
            }

            MyUserContactInfo::addNew($request);
            return response()->json([
                'success' => false,
                'msg' => "Something went wrong! Please try again later ."
            ],400);
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
        //
    }

    public function doclienhe($id,Request $request) {
//        return $request;
        $myContact = MyContact::find($id);
        if($myContact) {
            $myContact->status = "Y";
            $myContact->save();
            return  response()->json([
                'success' => true,
                'msg' => "Đã đọc bài viết",
            ],200);
        }
        return response()->json([
            'success' => false,
            'msg' => "Éo tìm thấy mày ơi",
        ],404);
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

    public function delete($id) {
        $myContact = MyContact::find($id);
        if($myContact) {
            $myContact->delete();
            return response()->json([
                'success' => true,
                'msg' => "Đã xóa bài viết",
            ],200);
        }
        return response()->json([
            'success' => false,
            'msg' => "Éo tìm thấy mày ơi",
        ],404);
    }

    public function destroy($id)
    {
        //
    }
}
