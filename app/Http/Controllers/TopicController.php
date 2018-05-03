<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyFileManagement;
use App\MyTag;
use App\MyTopic;
use App\MyTypePost;
use Illuminate\Http\Request;
use Image;
use Illuminate\Routing\Route;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $controllerName;
    public $actionName;
    public function __construct(Route $route)
    {
        $this->middleware('auth');
        $tempArr = explode('@',$route->getActionName());
        $tempArr1 = explode("\\",$tempArr[0]);
        $this->actionName = end($tempArr);
        $this->controllerName = end($tempArr1);
        unset($tempArr);
        unset($tempArr1);
    }

    public function index()
    {
        $myTopic = MyTopic::orderBy('type_post_id','asc')->paginate(10);
        return view('layouts.admin.topic.index')->withMyTopic($myTopic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = MyTag::all();
        $typePosts = MyTypePost::all();
        return view('layouts.admin.topic.create')
            ->withTags($tags)
            ->withTypePosts($typePosts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new MyTopic();
        $topic->title = $request->title;
        $topic->type_post_id = $request->type_post;
        $topic->description = $request->description;

        if($request->hasFile('image_name') && $request->file('image_name')->isValid()){
            $image = $request->file('image_name');
            $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
            $placeToSave = public_path('images/'.$filename);
            Image::make($image)
                ->resize(ConfigData::$imageWidthForRepresent,ConfigData::$imageHeightForRepresent)
                ->save($placeToSave);

            $topic->image_name = '/images/'.$filename;
            $topic->save();
            // This is for file management;
            $fileSize = filesize($placeToSave);
            $arrDataFileManage = ConfigData::arrDataForFileManagement(
                $this->controllerName,
                $this->actionName,
                MyTypePost::getTypePostName($request->type_post),
                $topic->id,
                $image->getClientOriginalExtension(),
                $filename,
                '/images/'.$filename,
                $fileSize,
                ConfigData::$imageWidthForRepresent.'x'.ConfigData::$imageHeightForRepresent
            );
            MyFileManagement::addNew($arrDataFileManage);

        } else {
            $topic->image_name = ConfigData::$nullValueForString;
            $topic->save();
        }
        $topic->tags()->sync($request->tags, false);
        return redirect()->route('topic.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $topic = MyTopic::find($id);
        $tags = MyTag::all();
        $typePosts = MyTypePost::all();
        if($topic){
            $arrTagSelected = MyTopic::getArrayTags($topic);
            return view('layouts.admin.topic.edit')
                ->withTopic($topic)
                ->withTags($tags)
                ->withArrTagSelected($arrTagSelected)
                ->withTypePosts($typePosts);
        } else {
            return view('layouts.admin.topic.create')
                ->withTags($tags)
                ->withTypePosts($typePosts);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , Route $route)
    {
//        return $this->actionName;

        $topic = MyTopic::find($id);
        if($topic) {
            $topic->title = $request->title;
            $topic->type_post_id = $request->type_post;
            $topic->description = $request->description;

            if($request->hasFile('image_name')) {
                $image = $request->file('image_name');
                $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
                $placeToSave = public_path('images/'.$filename);
                Image::make($image)->resize(400,300)->save($placeToSave);
                $topic->image_name = '/images/'.$filename;
            }
            $topic->save();
            if(isset($request->tags)){
                $topic->tags()->sync($request->tags);
            } else {
                $topic->tags()->sync(array());
            }
            return redirect()->route('topic.index');
        } else {
            return redirect()->route('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $topic = MyTopic::find($id);
        if($topic){
            $topic->delete();
            return redirect()->route('topic.index');
        } else {
            return redirect()->route('404');
        }
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
