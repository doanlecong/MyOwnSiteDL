<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use Egulias\EmailValidator\Warning\CFWSNearAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    //

    public function index(Request $request)
    {
        $topicBlogCount = MyTopic::countTopic('blog');
        $topicSerieCount = MyTopic::countTopic('serie');
        $topicChuyendeCount = MyTopic::countTopic('chuyende');
        $blogCount = MyPost::countPostBaseType('blog');
        $serieCount = MyPost::countPostBaseType('serie');
        $chuyendeCount = MyPost::countPostBaseType('chuyende');
        return view('layouts.admin.dashboard.dashboard')
            ->withTopicBlogCount($topicBlogCount)
            ->withTopicSerieCount($topicSerieCount)
            ->withTopicChuyendeCount($topicChuyendeCount)
            ->withBlogCount($blogCount)
            ->withSerieCount($serieCount)
            ->withChuyendeCount($chuyendeCount);
    }

    public function getMyblog()
    {
        $type = ConfigData::$typeBlog;
        $myblogs = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', '<>', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableblog', ['myblogs' => $myblogs, 'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMySerie()
    {
        $type = ConfigData::$typeSerie;
        $myserie = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', '<>', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableserie', ['myblogs' => $myserie,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyChuyende()
    {
        $type = ConfigData::$typeChuyende;
        $mychuyende = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', '<>', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tablechuyende', ['myblogs' => $mychuyende,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    // danh sach cac function cho post chua xuat ban

    public function getMyUnPublishblog()
    {
        $type = ConfigData::$typeBlog;
        $myblogs = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishblog', ['myblogs' => $myblogs,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyUnPuhlishserie()
    {
        $type = ConfigData::$typeSerie;
        $myserie = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishserie', ['myblogs' => $myserie,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyUnPublishchuyende()
    {
        $type = ConfigData::$typeChuyende;
        $mychuyende = MyPost::where('type_posts', ConfigData::getConvention($type))
            ->where('status', 'N')->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishchuyende', ['myblogs' => $mychuyende,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    // End danh sach chua xuat ban


    public function gettopicblog()
    {
        $type = ConfigData::$typeBlog;
        $mytopicblog = MyTopic::where('type_posts', ConfigData::getConvention('blog'))->with('posts')
            ->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tabletopicblog', ['mytopics' => $mytopicblog ,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function gettopicserie()
    {
        $type = ConfigData::$typeSerie;
        $mytopicblog = MyTopic::where('type_posts', ConfigData::getConvention($type))->with('posts')
            ->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tabletopicserie', ['mytopics' => $mytopicblog,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function gettopicchuyende()
    {
        $type = ConfigData::$typeChuyende;
        $mytopicblog = MyTopic::where('type_posts', ConfigData::getConvention($type))->with('posts')
            ->orderBy('updated_at', 'desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tabletopicchuyende', ['mytopics' => $mytopicblog,'type' => $type]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
}
