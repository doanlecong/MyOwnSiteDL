<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    //

    public function index(Request $request) {
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

    public function getMyblog() {
        $myblogs = MyPost::where('type_posts',ConfigData::getConvention('blog'))
            ->where('status','<>','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableblog',['myblogs' => $myblogs]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMySerie() {
        $myserie = MyPost::where('type_posts',ConfigData::getConvention('serie'))
            ->where('status','<>','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableserie',['myblogs' => $myserie]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyChuyende() {
        $mychuyende = MyPost::where('type_posts',ConfigData::getConvention('chuyende'))
            ->where('status','<>','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableserie',['myblogs' => $mychuyende]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
    // danh sach cac function cho post chua xuat ban

    public function getMyUnPublishblog() {
        $myblogs = MyPost::where('type_posts',ConfigData::getConvention('blog'))
            ->where('status','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishblog',['myblogs' => $myblogs]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyUnPuhlishserie() {
        $myserie = MyPost::where('type_posts',ConfigData::getConvention('serie'))
            ->where('status','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishserie',['myblogs' => $myserie]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function getMyUnPublishchuyende() {
        $mychuyende = MyPost::where('type_posts',ConfigData::getConvention('chuyende'))
            ->where('status','N')->orderBy('updated_at','desc')->paginate(5);
        return response(
            view('layouts.admin.dashboard.tableunpublishchuyende',['myblogs' => $mychuyende]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
    // End danh sach chua xuat ban


    public function gettopicblog() {
        $mytopicblog = MyTopic::where('type_posts',ConfigData::getConvention('blog'))
            ->orderBy('updated_at','desc')->paginate(5);
        return  response(
            view('layouts.admin.dashboard.tabletopicblog',['mytopics' => $mytopicblog]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function gettopicserie(){
        $mytopicblog = MyTopic::where('type_posts',ConfigData::getConvention('serie'))
            ->orderBy('updated_at','desc')->paginate(5);
        return  response(
            view('layouts.admin.dashboard.tabletopicserie',['mytopics' => $mytopicblog]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function gettopicchuyende() {
        $mytopicblog = MyTopic::where('type_posts',ConfigData::getConvention('chuyende'))
            ->orderBy('updated_at','desc')->paginate(5);
        return  response(
            view('layouts.admin.dashboard.tabletopicchuyende',['mytopics' => $mytopicblog]),
            200,
            ['Content-Type',ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
}
