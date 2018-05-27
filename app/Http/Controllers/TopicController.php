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
use Purifier;

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
        $myTopic = MyTopic::orderBy('type_posts','asc')->paginate(10);
        $typeBlog = ConfigData::getConvention(ConfigData::$typeBlog);
        $typeSerie = ConfigData::getConvention(ConfigData::$typeSerie);
        $typeChuyende = ConfigData::getConvention(ConfigData::$typeChuyende);
        return view('layouts.admin.topic.index')
            ->withMyTopic($myTopic)
            ->withTypeBlog($typeBlog)
            ->withTypeSerie($typeSerie)
            ->withTypeChuyende($typeChuyende);
    }


    /**
     * Get Table Topic by type of topic
     * AJAX request
     * Return HTML
     */
    public function getTopic($type){
        if(in_array($type, ConfigData::arrConventionPostType())){
            $myTopic = MyTopic::where('type_posts',$type)->paginate(5);
            return  response(
                view('layouts.admin.topic.table_topic', ['myTopic' => $myTopic, 'type' => $type]),
                200,
                ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
            );
        }
        return response(
            view('layouts.admin.post.notfound'),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = MyTag::all();
        $typePosts = ConfigData::arrKeyValuePostType();
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
        $topic->type_posts = $request->type_post;
        $topic->slug = $request->slug;
        $topic->description = Purifier::clean($request->description);

        if($request->hasFile('image_name') && $request->file('image_name')->isValid()){
            $image = $request->file('image_name');
            $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
            $placeToSave = base_path('images/'.$filename); //public_path('images/'.$filename)
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
        $typePosts = ConfigData::arrKeyValuePostType();
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
            $topic->type_posts = $request->type_post;
            $topic->slug = $request->slug;
            $topic->description = Purifier::clean($request->description);

            if($request->hasFile('image_name')) {
                $image = $request->file('image_name');
                $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
                $placeToSave = base_path('images/'.$filename);
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
