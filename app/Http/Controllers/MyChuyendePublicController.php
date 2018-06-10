<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use App\MyViewPost;
use Illuminate\Http\Request;

class MyChuyendePublicController extends Controller
{
    //
    public function index(){
        $topics = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeChuyende), 10);
        $topicsChuyende = $topics;
        $topicsSerie = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 10);
        $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
        return view('chuyende')
            ->withTopics($topics)
            ->withTopicsBlog($topicsBlog)
            ->withTopicsSerie($topicsSerie)
            ->withTopicsChuyende($topicsChuyende);
    }

    public function showTopic($topic) {
        $slug = ConfigData::convertLink($topic);
        $typeChuyende = ConfigData::getConvention(ConfigData::$typeChuyende);
        $topic = MyTopic::findBySlug($slug, $typeChuyende);

        if($topic) {
            $topics = MyTopic::findByType($typeChuyende,10);
            $posts = $topic->posts()->where('status','Y')->paginate(5);
            $newestPost = $topic->posts()->where('status','Y')->orderby('time_publish','desc')->first();
            $topicsChuyende = $topics;
            $topicsSerie = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 10);
            $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
            return view('show_topic_chuyende')
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
        $typeChuyende = ConfigData::getConvention(ConfigData::$typeChuyende);
        $post = MyPost::findBySlug($slug, $typeChuyende);

        if($post) {
            if($post->countView){
                MyViewPost::increase($post);
            } else {
                MyViewPost::addNew($post);
            }
            $count = MyViewPost::getCount($post);
            $topics = MyTopic::findByType($typeChuyende, 7);
            $amount = 4;
            $previousPosts = MyPost::findPreviosPost($post, $amount);
            $forwardPosts = MyPost::findForwardPost($post, $amount);
            $topicsChuyende = $topics;
            $topicsSerie = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeSerie), 10);
            $topicsBlog = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);
            return view('show_post_chuyende')
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
