<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use Illuminate\Http\Request;

class MyBlogPublicController extends Controller
{
    //
    public function index() {
        $newestPost = MyPost::where('type_posts', ConfigData::getConvention(ConfigData::$typeBlog))->orderby('created_at','desc')->first();
        $topics = MyTopic::findByType(ConfigData::getConvention(ConfigData::$typeBlog), 10);

        return view('myblog')
            ->withNewestPost($newestPost)
            ->withTopics($topics);
    }

    public function showTopic($topic) {
        $slug = ConfigData::convertLink($topic);
        $typeBlog = ConfigData::getConvention(ConfigData::$typeBlog);
        $topic = MyTopic::findBySlug($slug, $typeBlog);

        if($topic) {
            $topics = MyTopic::findByType($typeBlog,10);
            $posts = $topic->posts()->paginate(5);
            $newestPost = $topic->posts()->orderby('created_at','desc')->first();
            return view('show_topic_blog')
                ->withTopic($topic)
                ->withTopics($topics)
                ->withPosts($posts)
                ->withNewestPost($newestPost);
        }
        return redirect()->route('404');

    }

    public function showBaiViet($slug) {
        $slug = ConfigData::convertLink($slug);
        $typeBlog = ConfigData::getConvention(ConfigData::$typeBlog);
        $post = MyPost::findBySlug($slug, $typeBlog);

        if($post) {
            $topics = MyTopic::findByType($typeBlog, 3);
            $amount = 2;
            $previousPosts = MyPost::findPreviosPost($post, $amount);
            $forwardPosts = MyPost::findForwardPost($post, $amount);
            return view('show_post_blog')
                ->withPost($post)
                ->withTopics($topics)
                ->withPreviousPosts($previousPosts)
                ->withForwardPosts($forwardPosts);
        }
        return redirect()->route('404');

    }
}
