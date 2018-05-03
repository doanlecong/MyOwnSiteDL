<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyTypePost;
class TypePostController extends Controller
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
        $listTypePost = MyTypePost::all();
        return view('layouts.admin.typepostlist')->withListTypePost($listTypePost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.addtypepost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typePost = new MyTypePost();
        $typePost->title = $request->title;
        $typePost->description = $request->description;

        $typePost->save();
        return redirect()->route('typepost.index');
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
        $typepost = MyTypePost::find($id);
        if($typepost) {
            return view('layouts.admin.edit_typepost')->withTypepost($typepost);
        } else {
            return view('layouts.admin.addtypepost');
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
        $typepost = MyTypePost::find($id);
        if($typepost) {
            $typepost->title = $request->title;
            $typepost->description = $request->description;
            $typepost->save();

            return redirect()->route('typepost.index');
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
        $typepost = MyTypePost::find($id);
        $typepost->delete();
        return redirect()->route('typepost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $typepost = MyTypePost::find($id);
        $typepost->delete();
        return redirect()->route('typepost.index');
    }
}
