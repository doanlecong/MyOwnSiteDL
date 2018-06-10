<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use App\MyViewPost;
use Illuminate\Http\Request;

class MySeriePublicController extends Controller
{

    public function index() {
        $topics  = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 20);
        $posts = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeSerie))
            ->where('status','Y')
            ->orderBy('time_publish', 'asc')->paginate(10);
        $newestPosts = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeSerie))
            ->where('status','Y')
            ->orderBy('time_publish', 'desc')->take(3)->get();
        $topicsSerie = $topics;
        $topicsChuyende = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
        $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
        return view('serie')
            ->withTopics($topics)
            ->withPosts($posts)
            ->withNewestPosts($newestPosts)
            ->withTopicsBlog($topicsBlog)
            ->withTopicsSerie($topicsSerie)
            ->withTopicsChuyende($topicsChuyende);
    }

    public function showTopic($topic) {
        $slug = ConfigData::convertLink($topic);
        $typeSerie = ConfigData::getConvention(ConfigData::$typeSerie);
        $topic = MyTopic::findBySlug($slug, $typeSerie);

        if($topic) {
            $topics = MyTopic::findByType($typeSerie,10);
            $posts = $topic->posts()->where('status','Y')->paginate(5);
            $newestPost = $topic->posts()->where('status','Y')->orderby('time_publish','desc')->first();
            $topicsSerie = $topics;
            $topicsChuyende = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
            $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
            return view('show_topic_serie')
                ->withTopic($topic)
                ->withTopics($topics)
                ->withPosts($posts)
                ->withNewestPost($newestPost)
                ->withTopicsBlog($topicsBlog)
                ->withTopicsSerie($topicsSerie)
                ->withTopicsChuyende($topicsChuyende);
        }
        return redirect()->route('404-public');
    }

    public function showBaiViet($slug) {
        $slug = ConfigData::convertLink($slug);
        $typeSerie = ConfigData::getConvention(ConfigData::$typeSerie);
        $post = MyPost::findBySlug($slug, $typeSerie);
        if($post) {
            if($post->countView){
                MyViewPost::increase($post);
            } else {
                MyViewPost::addNew($post);
            }
            $count = MyViewPost::getCount($post);
            $topics = MyTopic::findByType($typeSerie, 10);
            $amount = 3;
            $previousPosts = MyPost::findPreviosPost($post, $amount);
            $forwardPosts = MyPost::findForwardPost($post, $amount);
            $topicsSerie = $topics;
            $topicsChuyende = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
            $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
            return view('show_post_serie')
                ->withPost($post)
                ->withCount($count)
                ->withTopics($topics)
                ->withPreviousPosts($previousPosts)
                ->withForwardPosts($forwardPosts)
                ->withTopicsBlog($topicsBlog)
                ->withTopicsSerie($topicsSerie)
                ->withTopicsChuyende($topicsChuyende);
        }
        return redirect()->route('404-public');
    }
}
