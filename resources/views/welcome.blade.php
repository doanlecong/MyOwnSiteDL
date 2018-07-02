@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typeit@5.10.1/dist/typeit.min.js" integrity="sha256-wV/fTluTFUM+Lv1nAc3DgjOOZlo12Dlf8Rsn2x/LU08=" crossorigin="anonymous"></script>
@endsection
@section('title')
    {{ " | Hãy sống với đam mê ☺ " }}
@endsection
@section('content')
    <div id="container-fluid" class="container-fluid justify-content-center border-top-blue border-bottom-bluethin">
        <div class="welcome_slogan d-flex justify-content-center align-items-center text-light background-tranparent">
            <h1 id="typejs" class="text-center font-roboto-light" style="font-size: 5rem"></h1>
            {{--<span>Don't stop when you're tired.</span> <span class="d-block font-weight-bold white-text padding-leftright-10 text-shadown-orange background-orange">STOP</span> when you are <span class="d-inline font-weight-bold white-text text-shadown-blue background-blue padding-top-10 padding-bottom-10 padding-leftright-10" >DONE</span>--}}
            {{--<span class="d-inline-block font-weight-bold out-line-white-big background-blue mt-2" style="font-size: 150%">Lập trình Web,<span class="background-darkblue"> lập trình Ứng dụng di động..</span></span>--}}
        </div>
        {{--<canvas id="canvas"></canvas>--}}
    </div>
    <div class="container no-padding-left-right no-padding-top border-top-blue shadow-lg" style="font-family: Roboto; transform: translateY(-80px); border-top-left-radius: 20px; border-top-right-radius: 20px;">
        <div class="jumbotron no-margin-bottom background-gradient-light-blue no-border-radius">
            <div class="row">
                <div class="col no-padding-left">
                    <a href="{{ route('myblog') }}" class="btn btn-white"><i class="fa fa-bars"></i> My Blog</a>
                    <span class="ml-xl-2 white-text">Những bài viết về chủ đề mà mình những điều mà mình quan tâm</span>
                </div>
            </div>
            <div class="row padding-around-20 background-tranparent border-top-white-m">
                <div class="col-12">
                    <span class="white-text font-lobster text-15">
                        <i class="fa fa-bookmark mr-2"></i>
                        <a style="text-decoration: none" class="animate-bottom-nocontent white-text" href="{{ route('blog.showTopic',$newestPost->topic->slug.".html") }}">
                            {{ $newestPost->topic->title }}
                        </a>
                    </span>
                </div>
                <div class="col-sm-3 ">
                    @if($newestPost->hinhdaidien != null && $newestPost->hinhdaidien != "NULL")
                        <img src="{{ $newestPost->hinhdaidien }}" class="image-full-width" alt="{{ $newestPost->title }}">
                    @else
                        <img src="{{ asset('upload/images/blankimage.jpg') }}" class="image-full-width" alt="{{ $newestPost->title }}">
                    @endif
                </div>
                <div class="col-sm-9 white-text">
                    <h2 class="text-shadown-black">
                        <a style="text-decoration: none"  class="animate-bottom-nocontent white-text" href="{{ route('blog.showBaiViet',$newestPost->slug.".html") }}">
                            {{ $newestPost->title }}
                        </a>
                    </h2>
                    <p class="lead text-justify">{{ strip_tags($newestPost->description)."..." }}</p>
                </div>
                <hr>
                <small class="text-15 white-text ml-3 border-bottom-white-thin">Đoạn trích : </small>
                <p class="lead white-text padding-around-20 font-weight-bold text-justify" >
                    {!! strip_tags(mb_substr($newestPost->content, 0, 1000))."..." !!}
                    <span>
                        <a class="btn btn-round btn-white text-15" href="{{ route('blog.showTopic',$newestPost->topic->slug.".html") }}">
                            <i class="fa fa-arrow-right mr-1" aria-hidden="true"></i> view more
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="jumbotron no-margin-bottom border-top-white-m no-padding-left-right no-padding-top no-padding-bottom">
            <div class="white-text background-gradient-light-blue padding-around-20">
                <a style="text-decoration: none" href="{{ route('serie-bv') }}" class="white-text text-15 btn btn-white" ><i class="fa fa-bars mr-2" aria-hidden="true"></i> Serie</a>
                <span class="white-text ml-xl-2">Những bài viết với các chủ đề liên quan đến một công nghệ hay các kỹ thuật nào đó mà mình thấy thú vị !</span>
            </div>
            <div class="row padding-top-20 background-litle-white">
                @foreach($threePostSerie as $post)
                    <div class="col-md-4">
                        <div class="card card-no-border shadow-lg box-shadown-light-dark" style="min-height: 400px;">
                            <div class="card-body background-gradient-light-blue no-padding-left-right no-padding-top">
                                <blockquote class="blockquote mb-0">
                                    <div class="image-card" style="background: url('{{ $post->hinhdaidien }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 200px;"></div>
                                    <div style="padding: 1.25rem;">
                                        <p class="mt-1 white-text">
                                            <a title="{{ ucfirst($post->title) }}" href="{{ route('serie.showBaiViet', $post->slug.".html") }}" style="text-decoration: none" class="white-text">
                                                {{ ucfirst(mb_substr($post->title, 0, 40)) }}{{ strlen($post->title) > 40 ? "...": "" }}
                                            </a>
                                        </p>
                                        <p>
                                            @foreach($post->tags as $tag)
                                                <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} "
                                                      style="cursor: pointer;">#{{$tag->abbrev}}</span>
                                            @endforeach
                                        </p>
                                        <span class="text-sm-left white-text badge " title="{{ $post->topic->title }}">
                                            <i class="fa fa-telegram mt-1" aria-hidden="true"></i> Topic :{{ mb_substr($post->topic->title, 0, 25)}}{{ strlen($post->topic->title) > 25 ? "...": "" }}
                                        </span>
                                        <footer class="blockquote-footer white-text">{{ mb_substr(strip_tags($post->description),0,60) }}
                                            <cite title="Source Title"><i class="fa fa-clock-o white-text"></i> {{ date('Y/m/d h:i a',strtotime($post->time_publish)) }}</cite>
                                        </footer>
                                        <a href="{{ route('serie.showBaiViet', $post->slug.".html") }}" class="btn btn-outline-primary btn-round btn-white mt-2"><i class="fa fa-eye mr-1" aria-hidden="true"></i>Đọc nào</a>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col mt-2">
                    <h5 class="text-right">
                        <a title="Xem danh sách" href="{{ route('serie-bv') }}" class="btn white-text btn-round btn-white hover-cyan box-shadown-light-dark text-20 pl-5 pr-5 mt-4"><i class="fa fa-cloud fa-2x cyan-text text-hover-white scale-onetwo" aria-hidden="true"></i></a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="jumbotron no-padding-left-right no-padding-top border-top-white-m background-gradient-light-blue">
            <div class="white-text background-gradient-light-blue padding-around-20">
                <a style="text-decoration: none" href="{{ route('chuyende') }}" class="white-text text-15 btn btn-white" ><i class="fa fa-bars mr-2" aria-hidden="true"></i> Chuyên đề</a>
                <span class="white-text ml-xl-2">Trong đây sẽ là những bài viết với các chủ để phổ quát!</span>
            </div>
            <div class="row padding-top-20 background-litle-white border-top-white-m">
                @foreach($threePostChuyende as $post)
                    <div class="col-md-4">
                        <div class="card card-no-border box-shadown-light-dark shadow-lg" style="min-height: 400px;">
                            <div class="card-body background-gradient-dark-cyan no-padding-left-right no-padding-top">
                                <div class="image-card" style="background: url('{{ $post->hinhdaidien }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 200px;"></div>
                                <blockquote class="blockquote mb-0">
                                    <div style="padding: 1.25rem;">
                                        <p class="mt-1 white-text background-litle-white p-1">
                                            <a title="{{ ucfirst($post->title) }}" href="{{ route('chuyende.showBaiViet', $post->slug.".html") }}" style="text-decoration: none" class="white-text">
                                                {{ ucfirst(mb_substr($post->title, 0, 40)) }}{{ strlen($post->title) > 40 ? "...": "" }}
                                            </a>
                                        </p>
                                        <p>
                                            @foreach($post->tags as $tag)
                                                <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} "
                                                      style="cursor: pointer;">#{{$tag->abbrev}}</span>
                                            @endforeach
                                        </p>
                                        <span class="text-sm-left cyan-text badge" title="{{ $post->topic->title }}">
                                            <i class="fa fa-telegram mt-1" aria-hidden="true"></i> Topic :{{ mb_substr($post->topic->title, 0, 25)}}{{ strlen($post->topic->title) > 25 ? "...": "" }}
                                        </span>
                                        <footer class="blockquote-footer white-text ">{{ mb_substr(strip_tags($post->description),0,20) }}  <cite title="Source Title"><i class="fa fa-clock-o white-text"></i> {{ date('Y/m/d h:i a',strtotime($post->time_publish)) }}</cite></footer>
                                        <a href="{{ route('chuyende.showBaiViet', $post->slug.".html") }}"  class="btn btn-round btn-white mt-2"><i class="fa fa-eye mr-1" aria-hidden="true"></i>Đọc nào</a>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col mt-2">
                    <h5 class="text-right background-litle-white mt-4 padding-around-20">
                        <span class="text-sm-left"><small class="white-text">Trên là các bài viết mới nhất trong các chủ đề , ngoài ra bạn có thể click vào button sau để xem toàn bộ danh sách</small></span>
                        <a title="Xem danh sách" href="{{ route('chuyende') }}" class="btn white-text btn-round btn-primary box-shadown-light-dark text-20 pl-5 pr-5">
                            <i class="fa fa-angle-double-right white-text " aria-hidden="true"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="jumbotron no-padding-left-right no-padding-top border-top-white-m background-gradient-light-blue">
            <div class="white-text background-gradient-light-blue padding-around-20">
                <a style="text-decoration: none" href="{{ route('gioithieu') }}" class="white-text text-15 btn btn-white" ><i class="fa fa-bars mr-2" aria-hidden="true"></i> Giới thiệu</a>
                <span class="white-text ml-xl-2 d-inline-block">Một vài thông tin vớ vẩn về tác giả</span>
            </div>
            <div class="row padding-around-20 background-litle-white border-top-white-m">
                <div class="col-sm-3 text-right no-padding-left">
                    <img src="{{asset('upload/images/myseft.jpg')}}" alt="mY_SELFT" class="w-50 " style="filter: grayscale(40) blur(2px);">
                </div>
                <div class="col-sm-9 white-text text-justify no-padding-right text-15">
                    <big><strong>Doan Le</strong></big> là một người dễ tính có điều kiện . Mình rất thích ngồi đọc sách về cuộc sống cũng như tự mình nghiên cứu các công nghệ mới.
                    Web Development là công việc chính của mình. Ngoài ra còn mình còn làm một số công việc khác không liên quan gì lắm đến công nghệ .
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addScript')
    <script>
        $(document).ready(function () {
            new TypeIt('#typejs',  {
                speed: 300,
                lifeLike: true,
                autoStart: false
            }).type('<span>Don\'t stop when you\'re tired.</span>')
                .pause(2000).type('<span class="d-block font-weight-bold white-text padding-leftright-10 text-shadown-orange background-orange">STOP</span> when you are <span class="d-inline font-weight-bold white-text text-shadown-blue background-blue padding-top-10 padding-bottom-10 padding-leftright-10" >DONE</span>')
                .option({speed: 200}).type('...');
        })
    </script>
@endsection