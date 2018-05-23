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
    <div class="container border-top-blue no-padding-top padding-leftright-10 border-left-blue-m">
        @foreach($topics as $key => $topic)
            @if($key % 2 == 0)
                <div class="row padding-top-20 padding-bottom-10 ">
                    <div class="col-sm-4 border-top-blue-m background-litle-white">
                        <h4 class="animate-bottom-nocontent font-weight-bold font-roboto-light mt-3">
                            <a style="text-decoration: none;" href="{{ route('chuyende.showTopic', $topic->slug.".html")}}" class="text-dark">{{ $topic->title }}</a>
                        </h4>
                        @foreach($topic->tags as $tg)
                            <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tg->name }}">{{ $tg->abbrev }}</span>
                        @endforeach
                        <p class="text-20 text-dark"><small>Publish at : <i class="fa fa-clock-o purple-text fa-2x"></i> {{ date('Y/m/d h:i a',strtotime($topic->created_at)) }}</small></p>
                        <img src="{{ $topic->image_name }}" class="image-full-width scale-onetwo box-shadown-darkblue" alt="{{ $topic->title }}">
                        <p class="text-dark mt-3 text-20"><i class="fa fa-flag purple-text"></i> {{ $topic->posts()->count() }} bài</p>
                        <p class="text-dark text-15 mt-3">
                            {{ mb_substr(strip_tags($topic->description), 0, 100) }}
                        </p>
                        <a href="{{ route('chuyende.showTopic', $topic->slug.".html") }}" class="btn btn-block mb-3 white-text font-weight-bold box-shadown-light-dark border-left-blue-m background-litle-tranparent" title="{{ $topic->title }}">
                            <i class="fa fa-bars"></i> Xem Típ
                        </a>
                    </div>
                    <div class="col-sm-8 no-padding-right">
                        @foreach($topic->posts()->where('status','Y')->take(3)->get() as $post)
                            <div class="row border-top-blue-m background-litle-white mb-3">
                                <div class="col-sm-4 no-padding-left padding-top-20">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width scale-onetwo" alt="{{ $post->title }}">
                                </div>
                                <div class="col-sm-8 ">
                                    <h5 class="font-roboto-light font-weight-bold mt-2 text-20">
                                        <a style="text-decoration: none;" href="{{ route('chuyende.showBaiViet',$post->slug.".html")}}" class="text-dark animate-bottom">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    @foreach($post->tags as $tag)
                                        <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tag->name }}">{{ $tag->abbrev }}</span>
                                    @endforeach
                                    <br>
                                    <small class="text-dark">Publish at: <i class="fa fa-clock-o fa-2x purple-text"></i>  {{ date('Y/m/d h:i a',strtotime($post->created_at)) }}</small>
                                    <p class="text-dark text-15">
                                        {{ mb_substr(strip_tags($post->description),0,130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('chuyende.showTopic',$topic->slug.".html") }}" class="btn background-litle-tranparent btn-block white-text box-shadown-light-dark border-left-blue-m" title="{{$topic->title}}">
                            <i class="fa fa-bars "></i> Xem Danh Sách
                        </a>
                    </div>
                </div>
                <div class="shade-white"></div>
                <div class="border-top-blue"></div>
            @else
                <div class="row padding-top-20 padding-bottom-10 ">
                    <div class="col-sm-8">
                        @foreach($topic->posts()->where('status','Y')->take(3)->get() as $post)
                            <div class="row border-top-purple-thin background-litle-white mb-3">
                                <div class="col-sm-4 no-padding-left padding-top-20">
                                    <img src="{{ $post->hinhdaidien }}" class="image-full-width scale-onetwo" alt="{{ $post->title }}">
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-roboto-light text-20 font-weight-bold mt-2">
                                        <a style="text-decoration: none;" href="{{ route('chuyende.showBaiViet',$post->slug.".html")}}" class="text-dark animate-bottom">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    @foreach($post->tags as $tag)
                                        <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tag->name }}">{{ $tag->abbrev }}</span>
                                    @endforeach
                                    <br><small class="text-dark"> Publish at: <i class="fa fa-clock-o fa-2x purple-text"></i> {{ date('Y/m/d h:i a',strtotime($post->created_at)) }}</small>
                                    <p class="text-dark text-15">
                                        {{ mb_substr(strip_tags($post->description),0,130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('chuyende.showTopic',$topic->slug.".html") }}" class="mb-0 btn background-litle-tranparent white-text text-dark btn-block box-shadown-light-dark border-left-purple-thin" title="{{$topic->title}}">
                            <i class="fa fa-bars"></i> Xem Danh Sách
                        </a>
                    </div>
                    <div class="col-sm-4 border-top-purple-thin background-litle-white ">
                        <h4 class="font-roboto-light mt-3">
                            <a style="text-decoration: none;" href="{{ route('chuyende.showTopic', $topic->slug.".html")}}" class="text-dark animate-bottom-nocontent font-weight-bold">{{ $topic->title }}</a>
                        </h4>
                        @foreach($topic->tags as $tg)
                            <span style="cursor: pointer;" class="badge background-purple white-text box-shadown-purple-thin" title="{{ $tg->name }}">{{ $tg->abbrev }}</span>
                        @endforeach
                        <p class="text-20 text-dark"><small>Publish at : <i class="fa fa-clock-o fa-2x purple-text"></i> {{ date('Y/m/d h:i a',strtotime($topic->created_at)) }}</small></p>
                        <img src="{{ $topic->image_name }}" class="image-full-width scale-onetwo box-shadown-darkblue" alt="{{ $topic->title }}">
                        <p class="text-dark m-3 text-20"><i class="fa fa-flag purple-text"></i>  {{ $topic->posts()->count() }} bài</p>
                        <p class="text-dark text-15 mt-3">
                            {{ mb_substr(strip_tags($topic->description), 0, 100) }}
                        </p>
                        <a href="{{ route('chuyende.showTopic', $topic->slug.".html") }}" class="btn background-litle-tranparent btn-block mb-3 font-weight-bold white-text box-shadown-light-dark border-left-purple-thin" title="{{ $topic->title }}">
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