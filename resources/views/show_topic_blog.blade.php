@extends('layouts.app')
@section('description')
    {{ $topic->title . " ". $topic->description}}
@endsection
@section('metadata')
    <meta name="{{$topic->title}}" content="{{ strip_tags($topic->description) }}">
    @foreach($topic->tags as $tag)
        <meta name="{{$tag->name}}" content="{{$tag->description}}">
        <meta name="{{$tag->abbrev}}" content="{{$tag->name}}">
    @endforeach
@endsection

@section('title')
    {{ " | ".$topic->title }}
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('myblog')}}">My Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $topic->title }}</li>

        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-left-right no-padding-top">
        <div class="row padding-top-30 padding-bottom-10" id="chuderow">
            <div class="col-12"><h4 class="text-center text-light font-lobster">Chủ đề</h4></div>
            <div class="col-sm-4">
                @if($topic->image_name != null &&  $topic->image_name != "NULL")
                    <img src="{{$topic->image_name}}" alt="{{ $topic->title }}" class="image-full-width" style="background-color: rgba(32,0,29,0.85);">
                @else
                    <img src="{{ asset('upload/images/blankimage.jpg') }}" alt="{{ $topic->title }}"
                         class="image-full-width">
                @endif
            </div>
            <div class="col-sm-8">
                <h1 class="text-shadown-lightblue text-light font-roboto-light">{{ $topic->title }}</h1>
                <p class="text-light font-roboto-light font-weight-bold">
                    {{ strip_tags($topic->description) }}
                </p>
            </div>
        </div>
        <div class="shade-purple"></div>
        <div class="container border-top-blue"></div>
        <h2 class="text-center font-roboto-light text-shadown-black mb-5 text-primary padding-leftright-10">Danh sách các bài trong chủ đề</h2>
        <div class="row">
            <div class="col-sm-12 col-md-4 border-around-blue">
                @if($newestPost != null)
                    <div>
                        <h4 class="text-left font-roboto-light padding-leftright-10 padding-top-10"><i class="fa fa-bolt blue-text" aria-hidden="true"></i> Bài mới nhất</h4>
                        <div class="shade-blue"></div>
                        <div class="devider-line"></div>
                        <h3 class="text-left font-roboto-light animate-bottom-nocontent">{{ $newestPost->title }}</h3>
                        <small>Publish at : {{ date('Y/m/d h:i a', strtotime($newestPost->created_at)) }}</small>
                        <p>
                            @foreach($newestPost->tags as $tag)
                                <span title="{{ $tag->name }}" style="cursor: pointer;"
                                      class="badge-pill badge-primary badge box-shadown-superdarkblue">#{{ $tag->abbrev }}</span>
                            @endforeach
                        </p>
                        <p>
                            <img src="{{ $newestPost->hinhdaidien }}" class="image-full-width box-shadown-darkblue scale-onetwo"
                                 alt="{{ $newestPost->title}}">
                        <p>
                            {{ strip_tags($newestPost->description) }}
                        </p>
                        </p>
                        <a href="{{ route('blog.showBaiViet',$newestPost->slug.".html") }}"
                           class="btn btn-primary text-light no-border-radius out-line-blue"><i class="fa fa-eye"
                                                                                                aria-hidden="true"></i>
                            Xem Típ</a>
                    </div>
                @else
                    <div>
                        <h4 class="text-left font-roboto-light padding-leftright-10 padding-top-10"><i class="fa fa-bolt blue-text" aria-hidden="true"></i> Bài viết sẽ có trong thời gian sớm nhất</h4>
                    </div>
                @endif

                @if(count($topics) >= 2)
                    <div class="shade-blue"></div>
                    <div class="devider-line"></div>
                    <h4 class="text-left text-primary  font-roboto-light"># Chủ đề khác</h4>
                    <div>
                        @foreach($topics as $tp)
                            @if($tp->id != $topic->id)
                                <h5 class="text-left text-primary font-roboto-light"><a class="animate-bottom-nocontent" href="{{ route('blog.showTopic',$tp->slug.'.html') }}">{{$tp->title}}</a></h5>
                            @endif
                        @endforeach
                    </div>

                @endif
            </div>
            <div class="col-sm-12 col-md-8">
                <h4 class="text-left font-roboto-light"><i class="fa fa-book blue-text" aria-hidden="true"></i> Bài trước đó</h4>
                @if(!empty($posts) && count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="row mb-2 padding-top-10 border-around-blue padding-bottom-10">
                            <div class="col-sm-4">
                                <img src="{{ $post->hinhdaidien }}" alt="{{ $post->title }}"
                                     class="image-full-width scale-onetwo box-shadown-darkblue">
                            </div>
                            <div class="col-sm-8">
                                <h4 class="text-left font-roboto-light">
                                    <a class="animate-bottom" href="{{ route('blog.showBaiViet',$post->slug.".html") }}">{{ $post->title }}</a>
                                </h4>

                                <p>
                                    {{ strip_tags(mb_substr($post->description, 0, 130))}}{{ (strlen($post->description)> 130) ? "...":"" }}
                                </p>
                                <span class="text-primary text-right"><small>Publish at : {{ date('Y/m/d h:i a',strtotime($post->created_at)) }}</small></span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center blue-text ">Sắp có rồi !</h3>
                @endif
                    <div class="text-center">{{ $posts->links() }}</div>
            </div>
        </div>
    </div>
@endsection