@extends('layouts.app')

@section('content')
    <div id="container-fluid" class="container-fluid justify-content-center border-top-blue border-bottom-bluethin">
        <div class="welcome_slogan d-flex justify-content-center align-items-center text-light background-tranparent">
            <h1 class="text-center font-roboto-light">Với mục đích chính là chia sẻ kiến thức về khoa học máy tính và các công nghệ
                <span class="d-inline-block font-weight-bold out-line-white-big background-blue mt-2" style="font-size: 150%">Lập trình Web,<span class="background-darkblue"> lập trình Ứng dụng di động..</span></span></h1>
        </div>
        <canvas id="canvas"></canvas>
    </div>
    <div class="container border-top-blue" style="font-family: Roboto">
        <div class="jumbotron">
            <small class="blue-text"><i class="fa fa-bookmark "></i>  <a style="text-decoration: none" class="animate-bottom-nocontent" href="{{ route('blog.showTopic',$newestPost->topic->slug.".html") }}">{{ $newestPost->topic->title }}</a></small>
            <div class="row">
                <div class="col-sm-3">
                    @if($newestPost->hinhdaidien != null && $newestPost->hinhdaidien != "NULL")
                        <img src="{{ $newestPost->hinhdaidien }}" class="image-full-width" alt="{{ $newestPost->title }}">
                    @else
                        <img src="{{ asset('upload/images/blankimage.jpg') }}" class="image-full-width" alt="{{ $newestPost->title }}">
                    @endif
                </div>
                <div class="col-sm-9">
                    <h1 class="display-6 title_baiviet"><a style="text-decoration: none"  class="animate-bottom-nocontent" href="{{ route('blog.showBaiViet',$newestPost->slug.".html") }}">{{ $newestPost->title }}</a></h1>
                    <p class="lead">{{ strip_tags($newestPost->description)."..." }}</p>
                </div>
            </div>

            <hr class="my-4">
            <p class="lead font-roboto-light">
                {!! strip_tags(mb_substr($newestPost->content, 0, 1000))."..." !!}
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg out-line-blue" href="{{ route('blog.showBaiViet',$newestPost->slug.".html" ) }}" role="button">Đọc Thêm</a>
            </p>
        </div>
        <div class="devider-line"></div>
        <div class="jumbotron">
            <h4 class="display-6 blue-text"><a style="text-decoration: none" href="{{ route('serie-bv') }}" ><i class="fa fa-bars" aria-hidden="true"></i> Serie</a></h4>
            <hr class="my-4">
            <p class="lead">
                <i class="fa fa-angle-double-right purple-text" aria-hidden="true"></i>
                <i class="fa fa-superpowers fa-spin blue-text" aria-hidden="true"></i>
                <i class="fa fa-angle-double-right purple-text" aria-hidden="true"></i>
                <i class="fa fa-angle-double-right purple-text" aria-hidden="true"></i>
                <i class="fa fa-superpowers fa-spin blue-text" aria-hidden="true"></i>
                <i class="fa fa-angle-double-right purple-text" aria-hidden="true"></i>
            </p>
            <div class="row">
                @foreach($threePostSerie as $post)
                    <div class="col-md-4">
                        <div class="card border border-dark box-shadown-light-dark" style="min-height: 300px;">
                            <div class="card-header background-blue text-15 font-roboto-light white-text" title="{{ $post->title }}">
                                {{ mb_substr($post->topic->title, 0, 40)}}{{ strlen($post->topic->title) > 40 ? "...": "" }}
                            </div>
                            <div class="card-body background-litle-white">
                                <blockquote class="blockquote mb-0">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width out-line-blue" title="{{ $post->title }}">
                                    <p class="mt-1">{{$post->title}}</p>
                                    <p>
                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} "
                                                  style="cursor: pointer;">#{{$tag->abbrev}}</span>
                                        @endforeach
                                    </p>
                                    <footer class="blockquote-footer">{{ mb_substr(strip_tags($post->description),0,20) }}  <cite title="Source Title"><i class="fa fa-clock-o blue-text"></i> {{ date('Y/m/d h:i a',strtotime($post->time_publish)) }}</cite></footer>
                                </blockquote>
                                <a href="{{ route('serie.showBaiViet', $post->slug.".html") }}"  class="btn btn-outline-primary out-line-blue mt-2">Đọc nào</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col mt-2">
                    <h5 class="text-right">
                        <a title="Xem danh sách" href="{{ route('serie-bv') }}" class="btn background-litle-tranparent white-text out-line-blue padding-around-20"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="devider-line"></div>
        <div class="jumbotron">
            <h4 class="display-6"><a href="{{ route('chuyende') }}"><i class="fa fa-bars" aria-hidden="true"></i> Chuyên đề</a></h4>
            <hr class="my-4">
            <p class="lead">Một số bài viết mới trong danh mục chuyên đề</p>
            <div class="row">
                @foreach($threePostChuyende as $post)
                    <div class="col-md-4">
                        <div class="card border border-dark" style="min-height: 300px;">
                            <div class="card-header background-blue text-20 font-roboto-light white-text">
                                {{ mb_substr($post->topic->title, 0, 30)}}{{ strlen($post->topic->title) > 30 ? "...": "" }}
                            </div>
                            <div class="card-body background-litle-white">
                                <blockquote class="blockquote mb-0">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width out-line-blue" title="{{ $post->title }}">
                                    <p class="mt-1">{{$post->title}}</p>
                                    <p>
                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} "
                                                  style="cursor: pointer;">#{{$tag->abbrev}}</span>
                                        @endforeach
                                    </p>
                                    <footer class="blockquote-footer">{{ mb_substr(strip_tags($post->description),0,20) }}  <cite title="Source Title"><i class="fa fa-clock-o blue-text"></i> {{ date('Y/m/d h:i a',strtotime($post->time_publish)) }}</cite></footer>
                                </blockquote>
                                <a href="{{ route('chuyende.showBaiViet', $post->slug.".html") }}"  class="btn btn-outline-primary out-line-blue mt-2">Đọc nào</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col mt-2">
                    <h5 class="text-right">
                        <a title="Xem danh sách" href="{{ route('chuyende') }}" class="btn background-litle-tranparent white-text out-line-blue padding-around-20"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection