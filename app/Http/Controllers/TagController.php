<?php

namespace App\Http\Controllers;

use App\ConfigData;
use Illuminate\Http\Request;
use App\MyTag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $arrTypeTag = ConfigData::getArrayTypeTAG();
        $listTag = MyTag::orderBy('type_tag','asc')->paginate(10);
        return view('layouts.admin.tag.index')
            ->withListTag($listTag)
            ->withArrTypeTag($arrTypeTag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrTypeTag = ConfigData::getArrayTypeTAG();
        return view('layouts.admin.tag.create')->withArrTypeTag($arrTypeTag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tag = new MyTag();
        $tag->name = $request->name;
        $tag->abbrev = $request->abbrev;
        $tag->type_tag = $request->type_tag;
        $tag->description = $request->description;
        $tag->save();
        return redirect()->route('tag.index');
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
        $arrTypeTag = ConfigData::getArrayTypeTAG();
        $tag = MyTag::find($id);
        if($tag) {
            return view('layouts.admin.tag.edit')
                ->withArrTypeTag($arrTypeTag)
                ->withTag($tag);
        } else {
            return redirect()->route('tag.create');
        }

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
        $tag = MyTag::find($id);
        if($tag) {
            $tag->name = $request->name;
            $tag->abbrev = $request->abbrev;
            $tag->type_tag = $request->type_tag;
            $tag->description = $request->description;
            $tag->save();
            return redirect()->route('tag.index');
        }else {
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
        $tag = MyTag::find($id);
        if($tag){
            $tag->delete();
            return redirect()->route('tag.index');
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
