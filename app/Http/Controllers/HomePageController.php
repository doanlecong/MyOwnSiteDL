<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index() {
        $newestPost = MyPost::where('type_posts',ConfigData::getConvention(ConfigData::$typeBlog))
            ->where('status','Y')->orderBy('time_publish', 'desc')->first();
        $threePostSerie = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeSerie))
            ->where('status','Y')->orderBy('time_publish','desc')->take(3)->get();
        $threePostChuyende = MyPost::where('type_posts',ConfigData::getConvention(ConfigData::$typeChuyende))
            ->where('status','Y')->orderBy('time_publish','desc')->take(3)->get();
        return view('welcome')
            ->withNewestPost($newestPost)
            ->withThreePostSerie($threePostSerie)
            ->withThreePostChuyende($threePostChuyende);
    }
}
