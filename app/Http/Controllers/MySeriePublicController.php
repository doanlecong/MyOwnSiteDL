<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use Illuminate\Http\Request;

class MySeriePublicController extends Controller
{

    public function index() {
        $topics  = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 20);
        $posts = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeSerie))->orderBy('created_at', 'asc')->paginate(10);
        $newestPosts = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeSerie))->orderBy('created_at', 'desc')->take(3)->get();
        return view('serie')
            ->withTopics($topics)
            ->withPosts($posts)
            ->withNewestPosts($newestPosts);
    }

    public function showTopic($topic) {
        $slug = ConfigData::convertLink($topic);
        $typeSerie = ConfigData::getConvention(ConfigData::$typeSerie);
        $topic = MyTopic::findBySlug($slug, $typeSerie);

        if($topic) {
            $topics = MyTopic::findByType($typeSerie,10);
            $posts = $topic->posts()->paginate(5);
            $newestPost = $topic->posts()->orderby('created_at','desc')->first();
            return view('show_topic_serie')
                ->withTopic($topic)
                ->withTopics($topics)
                ->withPosts($posts)
                ->withNewestPost($newestPost);
        }
        return redirect()->route('404');
    }

    public function showBaiViet($slug) {
        $slug = ConfigData::convertLink($slug);
        $typeSerie = ConfigData::getConvention(ConfigData::$typeSerie);
        $post = MyPost::findBySlug($slug, $typeSerie);
        if($post) {
            $topics = MyTopic::findByType($typeSerie, 10);
            $amount = 3;
            $previousPosts = MyPost::findPreviosPost($post, $amount);
            $forwardPosts = MyPost::findForwardPost($post, $amount);
            return view('show_post_serie')
                ->withPost($post)
                ->withTopics($topics)
                ->withPreviousPosts($previousPosts)
                ->withForwardPosts($forwardPosts);
        }
        return redirect()->route('404');
    }
}
