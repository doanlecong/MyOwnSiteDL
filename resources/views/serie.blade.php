@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Serie Bài Viết</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="shade-light-blue"></div>
    <div class="container border-top-blue topic_bottom_purple border-left-blue-m">
        <div class="row mb-3 ">
            <div class="col-sm col-md-8 no-padding-left no-padding-right ">
                @foreach($posts as $post)
                    <div class="row mt-2 ml-2 mr-2  border-left-blue-m background-litle-white box-shadown-light-dark">
                        <div class="col-sm-3 no-padding-left padding-top-20">
                            @if($post->hinhdaidien != null && $post->hinhdaidien != "NULL" )
                                <img src="{{ $post->hinhdaidien }}" alt="{{ $post->title }}"
                                     class=" image-full-width " title="{{ $post->title }}">
                            @else
                                <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                     class=" image-full-width" title="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="col-sm-9">
                            <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                <a class=" animate-bottom"
                                   href="{{ route('serie.showBaiViet',$post->slug.".html") }}">{{ $post->title }}</a>
                            </h5>
                            <small class="text-light font-weight-bold background-orange" style="font-size: 90%;">
                                <i class="fa fa-flag purple-text" aria-hidden="true"></i>
                                <a class="white-text"
                                   href="{{ route('serie.showTopic',$post->topic->slug.".html") }}">{{$post->topic->title}}</a>
                            </small>
                            @foreach($post->tags as $tag)
                                <span style="cursor: pointer;" class="badge badge-primary box-shadown-darkblue"
                                      title="{{ $tag->name }}"><i class="fa fa-hashtag"
                                                                  aria-hidden="true"></i> {{ $tag->abbrev }}</span>
                            @endforeach
                            <p class="font-roboto text-dark text-15">
                                {{ mb_substr(strip_tags($post->description), 0, 130) }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
            <div class="col-sm col-md-4">
                <div class="row mb-sm-5">
                    <div class="col no-padding-left-right">
                        <h2 class="font-roboto-light text-primary mt-3">
                            <i class="fa fa-hashtag fa-2x" aria-hidden="true"></i> Chủ đề cùng thể loại
                        </h2>
                        <div class="shade-light-blue"></div>
                        <div class="border-top-blue mb-3"></div>
                        <ul class="list-group">
                            @foreach($topics as $topic)
                                <li class="list-group-item d-flex justify-content-between align-items-center no-border-radius  border-left-blue-m mb-2 background-gradient-orange-violet box-shadown-light-dark">
                                    <span class="white-text font-weight-bold">
                                        <i class="fa fa-hashtag yellow-text fa-2x" aria-hidden="true"></i>
                                        <a class="animate-bottom-nocontent white-text"
                                           href="{{ route('serie.showTopic', $topic->slug.".html") }}">{{ $topic->title }}</a>
                                    </span>
                                    <span style="padding: 7px;"
                                          class="badge badge-primary badge-pill box-shadown-darkblue">{{ $topic->posts()->where('status','Y')->count() }}
                                        bài</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col no-padding-left-right">
                        <h2 class="font-roboto-light white-text mt-3"><i class="fa fa-bolt fa-2x" aria-hidden="true"></i> Mới
                            Nhất Đây</h2>
                        <div class="shade-white"></div>
                        <div class="border-top-blue mb-3"></div>
                        @foreach($newestPosts as $newPost)
                            <div class="row background-gradient-orange-violet mb-3 border-top-blue-m box-shadown-light-dark">
                                <div class="col-sm-4">
                                    @if($newPost->hinhdaidien != null && $newPost->hinhdaidien != "NULL" )
                                        <img src="{{ $newPost->hinhdaidien }}" alt="{{ $newPost->title }}"
                                             class=" image-full-width padding-top-20" title="{{ $newPost->title }}">
                                    @else
                                        <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                             class="image-full-width padding-top-20" title="{{ $newPost->title }}">
                                    @endif
                                </div>
                                <div class="col-sm-8 no-padding-right">
                                    <h5 class="font-roboto font-weight-bold white-text mt-3">
                                        <a class="text-light animate-bottom text-shadown-black"
                                           href="{{ route('serie.showBaiViet',$newPost->slug.".html") }}">{{ $newPost->title }}</a>
                                    </h5>
                                    <small class="text-light font-weight-bold background-orange"
                                           style="font-size: 90%;">
                                        <i class="fa fa-flag" aria-hidden="true"></i>
                                        <a class="white-text"
                                           href="{{ route('serie.showTopic',$newPost->topic->slug.".html") }}">{{$newPost->topic->title}}</a>
                                    </small>
                                    @foreach($newPost->tags as $tag)
                                        <span style="cursor: pointer;" class="badge badge-primary box-shadown-darkblue"
                                              title="{{ $tag->name }}"><i class="fa fa-hashtag"
                                                                          aria-hidden="true"></i> {{ $tag->abbrev }}</span>
                                    @endforeach
                                    <p class="font-roboto-light white-text">
                                        {{ mb_substr(strip_tags($newPost->description), 0, 80) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection