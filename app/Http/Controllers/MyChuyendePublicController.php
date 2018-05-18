<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use Illuminate\Http\Request;

class MyChuyendePublicController extends Controller
{
    //
    public function index(){
        $topics = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
        return view('chuyende')
            ->withTopics($topics);
    }

    public function showTopic($topic) {
        $slug = ConfigData::convertLink($topic);
        $typeChuyende = ConfigData::getConvention(ConfigData::$typeChuyende);
        $topic = MyTopic::findBySlug($slug, $typeChuyende);

        if($topic) {
            $topics = MyTopic::findByType($typeChuyende,10);
            $posts = $topic->posts()->paginate(5);
            $newestPost = $topic->posts()->orderby('created_at','desc')->first();
            return view('show_topic_chuyende')
                ->withTopic($topic)
                ->withTopics($topics)
                ->withPosts($posts)
                ->withNewestPost($newestPost);
        }
        return redirect()->route('404');
    }

    public function showBaiViet($slug) {
        $slug = ConfigData::convertLink($slug);
        $typeChuyende = ConfigData::getConvention(ConfigData::$typeChuyende);
        $post = MyPost::findBySlug($slug, $typeChuyende);

        if($post) {
            $topics = MyTopic::findByType($typeChuyende, 7);
            $amount = 4;
            $previousPosts = MyPost::findPreviosPost($post, $amount);
            $forwardPosts = MyPost::findForwardPost($post, $amount);
            return view('show_post_chuyende')
                ->withPost($post)
                ->withTopics($topics)
                ->withPreviousPosts($previousPosts)
                ->withForwardPosts($forwardPosts);
        }
        return redirect()->route('404');
    }
}
