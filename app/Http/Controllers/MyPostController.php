<?php

namespace App\Http\Controllers;

use App\ConfigData;
use App\MyPost;
use App\MyTag;
use App\MyTopic;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class MyPostController extends Controller
{
    //

    public function danhsachblog()
    {
//        $countBlog = MyPost::countPostBaseType('blog');
        $countTopic = MyTopic::countTopic('blog');
        $countPublishBlog = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeBlog, ConfigData::$publish);
        $countUnpublishBlog = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeBlog, ConfigData::$unPublish);
        $typeBlog = ConfigData::$typeBlog;
        $unPublish = ConfigData::$unPublish;
        $publish = ConfigData::$publish;
        return view('layouts.admin.post.indexblog')
            ->withCountPublishBlog($countPublishBlog)
            ->withCountUnpublishBlog($countUnpublishBlog)
            ->withCountTopic($countTopic)
            ->withTypeBlog($typeBlog)
            ->withUnPublish($unPublish)
            ->withPublish($publish);
    }

    public function danhsachserie()
    {
        $countTopic = MyTopic::countTopic('serie');
        $countPublishSerie = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeSerie, ConfigData::$publish);
        $countUnpublishSerie = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeSerie, ConfigData::$unPublish);
        $typeSerie = ConfigData::$typeSerie;
        $unPublish = ConfigData::$unPublish;
        $publish = ConfigData::$publish;
        return view('layouts.admin.post.indexserie')
            ->withCountPublishSerie($countPublishSerie)
            ->withCountUnpublishSerie($countUnpublishSerie)
            ->withCountTopic($countTopic)
            ->withTypeSerie($typeSerie)
            ->withUnPublish($unPublish)
            ->withPublish($publish);
    }

    public function danhsachchuyende()
    {
//        $countChuyende = MyPost::countPostBaseType('chuyende');
        $countTopic = MyTopic::countTopic('chuyende');
        $countPublishChuyende = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeChuyende, ConfigData::$publish);
        $countUnpublishChuyende = MyPost::countPostBaseTypeAndStatus(ConfigData::$typeChuyende, ConfigData::$unPublish);
        $typeChuyende = ConfigData::$typeChuyende;
        $unPublish = ConfigData::$unPublish;
        $publish = ConfigData::$publish;
        return view('layouts.admin.post.indexchuyende')
            ->withCountPublishChuyende($countPublishChuyende)
            ->withCountUnpublishChuyende($countUnpublishChuyende)
            ->withCountTopic($countTopic)
            ->withTypeChuyende($typeChuyende)
            ->withUnPublish($unPublish)
            ->withPublish($publish);
    }

    public function getPostTable($typepost, $ispublic)
    {
        if ($typepost == ConfigData::$typeBlog) return $this->getMyBlog($ispublic);
        if ($typepost == ConfigData::$typeSerie) return $this->getMySerie($ispublic);
        if ($typepost == ConfigData::$typeChuyende) return $this->getMyChuyende($ispublic);
        return response(
            view('layouts.admin.post.notfound'),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function viewInstancePost($type, $id)
    {
        $myPost = MyPost::find($id);
        if ($myPost) {
            return response(
                view('layouts.admin.post.view-in-page', ['myblog' => $myPost,'type' => $type]),
                200,
                ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
            );
        }
        return response(
            view('layouts.admin.post.notfound'),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function writePost($type, $idTopic = "")
    {
        $myTopic = null;
        $previousPosts = null;
        $tags = MyTag::orderBy('type_tag', 'asc')->get();
        $typeTags = ConfigData::getArrayTypeTAG();
        if (isset($idTopic)) {
            $myTopic = MyTopic::find($idTopic);
            $previousPosts = MyPost::where('my_topics_id', $idTopic)->orderBy('previous_post_id', 'desc')->get();
        } else {
            $previousPosts = MyPost::where('type_posts', $type)->orderBy('my_topics_id', 'desc')->get();
        }
//        echo dd($previousPosts); die;
        $topics = MyTopic::where('type_posts', ConfigData::getConvention($type))
            ->orderBy('updated_at', 'desc')->get();
        if (ConfigData::getConvention($type) == NULL) {
            return view('layouts.admin.404');
        }
//        echo dd($topics); die;
        return view('layouts.admin.post.createpost')
            ->withType($type)
            ->withTopics($topics)
            ->withMyTopic($myTopic)
            ->withPreviousPosts($previousPosts)
            ->withTags($tags)
            ->withTypeTags($typeTags);
    }

    public function savePost($type, Request $request)
    {
        $newPost = new MyPost();
        $newPost = MyPost::setData($newPost,$request,$type);
        $newPost->save();
        if (isset($request->tags)) {
            $newPost->tags()->sync($request->tags);
        } else {
            $newPost->tags()->sync(array());
        }
        if ($type == ConfigData::$typeBlog) {
            return redirect()->route('mypost.danhsachblog');
        } elseif ($type == ConfigData::$typeSerie) {
            return redirect()->route('mypost.danhsachserie');
        } elseif ($type == ConfigData::$typeChuyende) {
            return redirect()->route('mypost.danhsachchuyende');
        }
    }

    public function editPost($type, $id) {
        $myPost = MyPost::find($id);
        if($myPost) {
            $tags = MyTag::orderBy('type_tag', 'asc')->get();
            $typeTags = ConfigData::getArrayTypeTAG();
            $topics = MyTopic::where('type_posts', ConfigData::getConvention($type))
                ->orderBy('updated_at', 'desc')->get();
            $arrTagSelected = MyPost::getArrTagSelected($myPost);
            $previousPosts = MyPost::with('topic')
                ->where('my_topics_id', $myPost->my_topics_id)->orderBy('my_topics_id', 'desc')->get();
            return view('layouts.admin.post.editpost')
                ->withTags($tags)
                ->withType($type)
                ->withTypeTags($typeTags)
                ->withTopics($topics)
                ->withMyPost($myPost)
                ->withArrTagSelected($arrTagSelected)
                ->withPreviousPosts($previousPosts);
        }
        return view('layouts.admin.404');
    }

    public function updatePost($type, $id, Request $request) {
//        return dd($request);
        $myPost =  MyPost::find($id);
        if($myPost) {
            $myPost = MyPost::setData($myPost, $request,$type);
            $myPost->save();
            if(isset($request->tags)){
                $myPost->tags()->sync($request->tags);
            } else {
                $myPost->tags()->sync(array());
            }

            if($type == ConfigData::$typeBlog) {
                return redirect()->route('mypost.danhsachblog');
            }
            if($type == ConfigData::$typeSerie) {
                return redirect()->route('mypost.danhsachserie');
            }
            if($type == ConfigData::$typeChuyende) {
                return redirect()->route('mypost.danhsachchuyende');
            }
        }
        return view('layouts.admin.404');
    }

    public function checkTitle($type, Request $request)
    {
        $title = $request->title;
        $isSuccess = MyPost::checkTitle($title);
        $slug = str_slug($title, '-');
        $canUseSlug = MyPost::checkSlug($slug);
        return response()->json([
            'success' => $isSuccess,
            'title' => $request->title,
            'canUseSlug' => $canUseSlug,
            'slug' => $slug
        ], 200);
    }

    public function checkSlug($type, Request $request)
    {
        $slug = $request->slug;
        $canUseSlug = MyPost::checkSlug($slug);
        return response()->json([
            'success' => $canUseSlug,
            'slug' => $slug,
            'formatSlug' => str_slug($slug),
            'canUseSlug' => (str_slug($slug) == $slug) ? true : false
        ], 200);
    }

    public function viewPostsOfTopic($type, $id) {
        $myTopic = MyTopic::find($id);
        if($myTopic) {
            $listPost = $myTopic->posts;
            return response(
                view('layouts.admin.post.listPostTopic', ['posts' => $listPost, 'type' => $type, 'topic' => $myTopic]),
                200,
                ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
            );
        }
        return response(
            view('layouts.admin.post.notfound'),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    public function viewPost($type, $id) {
        $post = MyPost::find($id);
        if($post){
            return view('layouts.admin.post.view-post')
                ->withType($type)
                ->withPost($post);
        }
        return view('layouts.admin.404');
    }

    private function getMyBlog($isPublish)
    {
        $myblogs = MyPost::where('type_posts', ConfigData::getConvention('blog'))
            ->where('status', $isPublish)->orderBy('updated_at', 'desc')->paginate(10);
        return response(
            view('layouts.admin.post.tableblog', ['myblogs' => $myblogs, 'type' => ConfigData::$typeBlog]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    private function getMySerie($isPublish)
    {
        $myserie = MyPost::where('type_posts', ConfigData::getConvention('serie'))
            ->where('status', $isPublish)->orderBy('updated_at', 'desc')->paginate(10);
        return response(
            view('layouts.admin.post.tableserie', ['myblogs' => $myserie, 'type' => ConfigData::$typeSerie]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }

    private function getMyChuyende($isPublish)
    {
        $mychuyende = MyPost::where('type_posts', ConfigData::getConvention('chuyende'))
            ->where('status', $isPublish)->orderBy('updated_at', 'desc')->paginate(10);
        return response(
            view('layouts.admin.post.tablechuyende', ['myblogs' => $mychuyende, 'type' => ConfigData::$typeChuyende]),
            200,
            ['Content-Type', ConfigData::getContentTypeResponseBaseFileType('json')]
        );
    }
}
