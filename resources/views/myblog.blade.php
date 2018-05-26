@extends('layouts.app')

@section('title')
    {{ " | Một vài phút ngẫu hững cũng như tâm sư vớ vẩn " }}
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Blog</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-left-right no-padding-top">
        <div class="row padding-top-10 padding-bottom-40 border-left-blue border-right-blue " id="chuderow">
            <div class="col-12">
                <h3 class="text-center text-light font-lobster text-shadown-black padding-bottom-10">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Bài Viết Mới Trong Thời Gian Gần Đây
                </h3>
            </div>
            <div class="col-sm-4 no-padding-left-right border-top-blue-m">
                @if($newestPost->hinhdaidien != null &&  $newestPost->hinhdaidien != "NULL")
                    <img src="{{$newestPost->hinhdaidien}}" alt="{{ $newestPost->title }}" class="image-full-width">
                @else
                    <img src="{{ asset('upload/images/blankimage.jpg') }}" alt="{{ $newestPost->title }}"
                         class="image-full-width">
                @endif
            </div>
            <div class="col-sm-8 padding-top-30 background-litle-tranparent border-top-blue-m padding-leftright-10">
                <h1 class="text-shadown-lightblue text-light font-roboto-light"><a class="text-light" style="text-decoration: none;" href="{{ route('blog.showBaiViet',$newestPost->slug.".html") }}" >{{ $newestPost->title }}</a></h1>
                @foreach($newestPost->tags as $tg)
                    <span class="badge badge-light text-primary box-shadown-darkblue scale-onetwo" title="{{ $tg->name }}">{{ $tg->abbrev }}</span>
                @endforeach
                <p class="text-light font-roboto-light font-weight-bold">
                    {{ strip_tags($newestPost->description) }}
                </p>
            </div>
        </div>
        <div class="shade-blue"></div>
        <div class="border-top-blue"></div>
        <h2 class="mb-0 text-primary mt-4 mb-4 text-center font-roboto-light" >Những bài viết còn đó đó , mời bạn đọc xem thêm.</h2>
        <?php $countTopic = count($topics); ?>
        @foreach($topics as $key => $topic)
            <div class=" padding-leftright-10 padding-bottom-10 padding-top-30 border-top-blue border-left-blue-m">
                <div class="row">
                    <div class="col-sm-4 background-litle-white padding-top-20 padding-bottom-10 mb-2 border-top-blue-m ">
                        <h4 class="font-roboto font-weight-bold text-center text-dark">
                            <a class="animate-bottom-nocontent blue-text" href="{{ route('blog.showTopic', $topic->slug.".html") }}">{{ $topic->title }}</a>
                        </h4>
                        @foreach($topic->tags as $tag)
                            <span title="{{ $tag->name }}" class="badge badge-primary box-shadown-darkblue mb-2">{{ $tag->abbrev }}</span>
                        @endforeach
                        <img src="{{ $topic->image_name }}" class="image-full-width scale-onetwo">
                        <p class="text-20 font-roboto-light text-dark mt-2"><i class="fa fa-flag purple-text"></i> {{ $topic->posts()->count() }} bài</p>
                        <p class="font-roboto-light text-dark">{{ mb_substr(strip_tags($topic->description),0 ,50) }}</p>
                        <a href="{{ route('blog.showTopic', $topic->slug.".html") }}" class="btn background-litle-tranparent white-text border-left-blue-m box-shadown-light-dark"><i class="fa fa-bars"></i> Danh Sách</a>
                    </div>
                    <div class="col-sm-8">
                        @foreach($topic->posts()->where('status','Y')->take(3)->get() as $post)
                            <div class="row padding-bottom-10 border-top-blue-m">
                                <div class="col-sm-3 no-padding-right no-padding-left padding-top-10">
                                    @if($post->hinhdaidien != null && $post->hinhdaidien != "NULL")
                                        <img src="{{ $post->hinhdaidien }}" class="image-full-width ">
                                    @else
                                        <img src="{{ asset('upload/images/blankimage.jpg') }}" class="image-full-width image-full-height">
                                    @endif
                                </div>
                                <div class="col-sm-9 background-litle-white padding-top-10">
                                    <h5 class="font-roboto font-weight-bold blue-text"><a class="blue-text animate-bottom-nocontent" href="{{ route('blog.showBaiViet', $post->slug.".html") }}">{{ $post->title }}</a></h5>
                                    @foreach($post->tags as $tag)
                                        <span title="{{ $tag->name }}" class="badge badge-primary text-light"><i class="fa fa-hashtag fa-2x"></i> {{ $tag->abbrev }}</span>
                                    @endforeach
                                    <p class="font-roboto-light text-dark">
                                        {{ mb_substr(strip_tags($post->description),0,130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('blog.showTopic', $topic->slug.".html") }}" class="btn border-left-blue-m background-litle-white box-shadown-light-dark btn-block text-20 text-dark">
                           <i class="fa fa-bars blue-text"></i> Xem Danh Sách
                        </a>
                    </div>
                </div>
            </div>
            @if( ($key + 1 ) != $countTopic)
                <div class="shade-blue"></div>
            @endif
        @endforeach
    </div>
@endsection