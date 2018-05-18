@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chuyên Đề</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="shade-white"></div>
    <div class="container border-top-blue no-padding-left-right no-padding-top ">
        @foreach($topics as $key => $topic)
            @if($key % 2 == 0)
                <div class="row padding-top-20 padding-bottom-10 ">
                    <div class="col-sm-4 border-top-blue-m background-litle-white">
                        <h4 class="animate-bottom-nocontent font-weight-bold font-roboto-light mt-3">
                            <a style="text-decoration: none;" href="{{ route('chuyende.showTopic', $topic->slug.".html")}}" class="yellow-text">{{ $topic->title }}</a>
                        </h4>
                        @foreach($topic->tags as $tg)
                            <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tg->name }}">{{ $tg->abbrev }}</span>
                        @endforeach
                        <p class="text-20 white-text"><small>Publish at : <i class="fa fa-clock-o"></i> {{ date('Y/m/d h:i a',strtotime($topic->created_at)) }}</small></p>
                        <img src="{{ $topic->image_name }}" class="image-full-width scale-onetwo box-shadown-darkblue" alt="{{ $topic->title }}">
                        <p class="white-text mt-3 text-20"><i class="fa fa-flag"></i> {{ $topic->posts()->count() }} bài</p>
                        <p class="white-text mt-3">
                            {{ mb_substr(strip_tags($topic->description), 0, 100) }}
                        </p>
                        <a href="{{ route('chuyende.showTopic', $topic->slug.".html") }}" class="btn btn-info btn-block mb-3 font-weight-bold box-shadown-darkblue border-top-blue-m" title="{{ $topic->title }}">
                            <i class="fa fa-bars"></i> Xem Típ
                        </a>
                    </div>
                    <div class="col-sm-8">
                        @foreach($topic->posts()->take(3)->get() as $post)
                            <div class="row border-top-blue-m background-litle-white mb-3">
                                <div class="col-4 no-padding-left">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width image-full-height scale-onetwo" alt="{{ $post->title }}">
                                </div>
                                <div class="col-8">
                                    <h5 class="font-roboto-light font-weight-bold mt-2">
                                        <a style="text-decoration: none;" href="{{ route('chuyende.showBaiViet',$post->slug.".html")}}" class="yellow-text animate-bottom">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    @foreach($post->tags as $tag)
                                        <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tag->name }}">{{ $tag->abbrev }}</span>
                                    @endforeach
                                    <br><small class="white-text"> Publish at: <i class="fa fa-clock-o"></i> {{ date('Y/m/d h:i a',strtotime($post->created_at)) }}</small>
                                    <p class="white-text">
                                        {{ mb_substr(strip_tags($post->description),0,130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('chuyende.showTopic',$topic->slug.".html") }}" class="btn background-litle-white btn-block white-text box-shadown-superdarkblue border-top-blue-m" title="{{$topic->title}}">
                            <i class="fa fa-bars"></i> Xem Danh Sách
                        </a>
                    </div>
                </div>
                <div class="shade-white"></div>
                <div class="border-top-blue"></div>
            @else
                <div class="row padding-top-20 padding-bottom-10 ">
                    <div class="col-sm-8">
                        @foreach($topic->posts()->take(3)->get() as $post)
                            <div class="row border-top-purple-thin background-litle-white mb-3">
                                <div class="col-4 no-padding-left">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width image-full-height scale-onetwo" alt="{{ $post->title }}">
                                </div>
                                <div class="col-8">
                                    <h5 class="font-roboto-light font-weight-bold mt-2">
                                        <a style="text-decoration: none;" href="{{ route('chuyende.showBaiViet',$post->slug.".html")}}" class="yellow-text animate-bottom">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    @foreach($post->tags as $tag)
                                        <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tag->name }}">{{ $tag->abbrev }}</span>
                                    @endforeach
                                    <br><small class="white-text"> Publish at: <i class="fa fa-clock-o"></i> {{ date('Y/m/d h:i a',strtotime($post->created_at)) }}</small>
                                    <p class="white-text">
                                        {{ mb_substr(strip_tags($post->description),0,130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('chuyende.showTopic',$topic->slug.".html") }}" class="mb-0 btn background-litle-white white-text btn-block box-shadown-superdarkblue border-top-purple-thin" title="{{$topic->title}}">
                            <i class="fa fa-bars"></i> Xem Danh Sách
                        </a>
                    </div>
                    <div class="col-sm-4 border-top-purple-thin background-litle-white ">
                        <h4 class="font-roboto-light mt-3">
                            <a style="text-decoration: none;" href="{{ route('chuyende.showTopic', $topic->slug.".html")}}" class="yellow-text animate-bottom-nocontent font-weight-bold">{{ $topic->title }}</a>
                        </h4>
                        @foreach($topic->tags as $tg)
                            <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tg->name }}">{{ $tg->abbrev }}</span>
                        @endforeach
                        <p class="text-20 white-text"><small>Publish at : <i class="fa fa-clock-o"></i> {{ date('Y/m/d h:i a',strtotime($topic->created_at)) }}</small></p>
                        <img src="{{ $topic->image_name }}" class="image-full-width scale-onetwo box-shadown-darkblue" alt="{{ $topic->title }}">
                        <p class="white-text m-3 text-20"><i class="fa fa-flag"></i>  {{ $topic->posts()->count() }} bài</p>
                        <p class="white-text mt-3">
                            {{ mb_substr(strip_tags($topic->description), 0, 100) }}
                        </p>
                        <a href="{{ route('chuyende.showTopic', $topic->slug.".html") }}" class="btn btn-info btn-block mb-3 font-weight-bold box-shadown-darkblue" title="{{ $topic->title }}">
                            <i class="fa fa-bars"></i> Xem Típ
                        </a>
                    </div>
                </div>
                <div class="shade-white"></div>
                <div class="border-top-blue"></div>
            @endif
        @endforeach
    </div>
@endsection