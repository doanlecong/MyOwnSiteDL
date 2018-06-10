<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
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
        $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
        $topicsSerie = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 10);
        $topicsChuyende = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
        return view('welcome')
            ->withNewestPost($newestPost)
            ->withThreePostSerie($threePostSerie)
            ->withThreePostChuyende($threePostChuyende)
            ->withTopicsBlog($topicsBlog)
            ->withTopicsSerie($topicsSerie)
            ->withTopicsChuyende($topicsChuyende);
    }
}
