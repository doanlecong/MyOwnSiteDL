@extends('layouts.app')
@section('description')
    {{ $post->title . " ". $post->description}}
@endsection
@section('metadata')
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:type" content="{{ $post->topic->title }}"/>
    <meta property="og:title" content="{{ $post->title }}"/>
    <meta property="og:description" content="{{ mb_substr(strip_tags($post->description),0, 200) }}"/>
    <meta property="og:image" content="{{ request()->root().$post->hinhdaidien }}"/>
    <meta name="{{$post->title}}" content="{{ strip_tags($post->description) }}">
    @foreach($post->tags as $tag)
        <meta name="{{$tag->name}}" content="{{$tag->description}}">
        <meta name="{{$tag->abbrev}}" content="{{$tag->name}}">
    @endforeach
@endsection

@section('title')
    {{ " | ".$post->title }}
@endsection

@section('scriptTop')
<?php
$date = date('w');
?>
@if(intval($date)%2 == 0 )
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
@else
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">
@endif
    <link rel="stylesheet" href="/css/content_post.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.3.0/highlightjs-line-numbers.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
    </script>
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('serie-bv')}}">My Serie</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('serie.showTopic',$post->topic->slug.".html")}}">{{ mb_substr($post->topic->title, 0, 20) }}</a>
            </li>
            <li class="breadcrumb-item">{{ mb_substr($post->title, 0, 50) }} {{ strlen($post->title)> 50 ? "...": "" }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-left-right no-padding-top">
        <div class="row padding-top-30 padding-bottom-10" id="chuderow">
            <div class="col-12"><h4 class="text-center text-light font-lobster">Bài Viết</h4></div>
            <div class="col-sm-4">
                @if($post->hinhdaidien != null &&  $post->hinhdaidien != "NULL")
                    <img src="{{$post->hinhdaidien}}" alt="{{ $post->title }}" class="image-full-width">
                @else
                    <img src="{{ asset('upload/images/blankimage.jpg') }}" alt="{{ $post->title }}"
                         class="image-full-width">
                @endif
            </div>
            <div class="col-sm-8">
                <h1 class="text-shadown-lightblue text-light font-roboto-light">{{ $post->title }}</h1>
                <p class="text-light font-roboto-light font-weight-bold">
                    {{ strip_tags($post->description) }}
                </p>
            </div>
        </div>
        <div class="shade-purple"></div>
        <div class="container border-top-blue"></div>
        <h3 class="text-center font-roboto-light mb-2 text-primary">Nội Dung</h3>
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="contentPost container content-post-show" id="contentPost">
                    <h1 class="text-primary">{{ $post->title }}</h1>
                    <p style="font-weight: 700; font-size: 18px;" class="text-justify">
                        {!! strip_tags($post->description) !!}
                    </p>
                    <span class="text-20"><i class="fa fa-eye blue-text"></i> {{ $count }}</span> @@@@ &nbsp;
                    <span><a href="{{ request()->url() }}#disqus_thread">0 Òm men</a></span>
                    <p>
                        @foreach($post->tags as $tag)
                            <span class="badge badge-pill badge-primary" title=" {{ $tag->name }} "
                                  style="cursor: pointer;">#{{$tag->abbrev}}</span>
                        @endforeach
                    </p>
                    <p>
                        Published at : {{ date('Y/m/d h:i a', strtotime($post->created_at)) }}
                    </p>
                    <div class="fb-share-button" data-href="{{ request()->url() }}" data-layout="button_count"
                         data-size="large" data-mobile-iframe="true">
                        <a target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                           class="fb-xfbml-parse-ignore">Chia sẻ</a>
                    </div>
                    <hr>
                    <p>
                        <?php echo $post->content; ?>
                    </p>
                    <hr>
                </div>
                <div class="topic_bottom_purple mt-5">
                    <div class="row padding-top-30 padding-bottom-40 padding-leftright-10">
                        @if(count($topics) <= 2)
                            @foreach($topics as $tp)
                                <div class="col-sm-12 col-md ">
                                    <div class="row  border-top-purple-thin mt-2 padding-top-10 background-litle-tranparent box-shadown-purple-thin">
                                        <div class="col-3 no-padding-right">
                                            @if($tp->image_name != null && $tp->image_name != "NULL")
                                                <img src="{{ $tp->image_name }}" class="image-full-width scale-onetwo"
                                                     alt="{{$tp->title}}">
                                            @else
                                                <img src="{{ asset('upload/images/blankimage.jpg')}}"
                                                     class="image-full-width scale-onetwo" alt="{{$tp->title}}">
                                            @endif
                                        </div>
                                        <div class="col-9 no-padding-right">
                                            <h5 class="text-left text-light font-roboto-light">
                                                <a class="{{ $tp->id == $post->my_topics_id ? "yellow-text font-weight-bold" : "white-text" }} animate-bottom-nocontent"
                                                   href="{{ route('serie.showTopic', $tp->slug.".html") }}">{{ $tp->title }}</a>
                                            </h5>
                                            <p class="text-light font-roboto-light">
                                                {{ mb_substr(strip_tags($tp->description),0 ,100).(strlen(strip_tags($tp->description)) > 100 ? "...":"") }}
                                            </p>
                                            <p>
                                                @foreach($tp->tags as $tg)
                                                    <span title="{{ $tg->name }}"
                                                          class="badge badge-pill badge-primary box-shadown-darkblue">{{ $tg->abbrev }}</span>
                                                @endforeach
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row padding-top-10 ">
                                @foreach($topics as $tp)
                                    <div class="col-sm-6  mt-2 ">
                                        <div class="row border-top-purple-thin mb-3 background-litle-tranparent padding-top-30">
                                            <div class="col-sm-3 no-padding-right">
                                                @if($tp->image_name != null && $tp->image_name != "NULL")
                                                    <img src="{{ $tp->image_name }}"
                                                         class="image-full-width scale-onetwo" alt="{{$tp->title}}">
                                                @else
                                                    <img src="{{ asset('upload/images/blankimage.jpg')}}"
                                                         class="image-full-width scale-onetwo" alt="{{$tp->title}}">
                                                @endif
                                            </div>
                                            <div class="col-sm-9 ">
                                                <h5 class="text-left font-roboto-light">
                                                    <a class="{{ $tp->id == $post->my_topics_id ? "yellow-text font-weight-bold" : "white-text" }} animate-bottom-nocontent"
                                                       href="{{ route('serie.showTopic', $tp->slug.".html") }}"><i
                                                                class="fa fa-hashtag"
                                                                aria-hidden="true"></i> {{ $tp->title }}</a>
                                                </h5>
                                                <span class="white-text"><i
                                                            class="fa fa-flag"></i> {{ $tp->posts()->count() }}
                                                    bài</span>
                                                <p class="text-light font-roboto-light">
                                                    {{ mb_substr(strip_tags($tp->description),0 ,100).(strlen(strip_tags($tp->description)) > 100 ? "...":"") }}
                                                </p>
                                                <p>
                                                    @foreach($tp->tags as $tg)
                                                        <span title="{{ $tg->name }}"
                                                              class="badge badge-pill badge-primary box-shadown-darkblue">{{ $tg->abbrev }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 border-around-blue">
                @foreach($previousPosts as $previousPost)
                    <div class="padding-leftright-10 padding-top-10 padding-bottom-10">
                        <h4 class="text-left font-roboto-light padding-leftright-10 padding-top-10">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                            Bài liên quan
                        </h4>
                        <div class="shade-blue"></div>
                        <div class="devider-line"></div>
                        <h4 class="text-left font-roboto-light ">
                            <a class="blue-text animate-bottom-nocontent"
                               href="{{ route('serie.showBaiViet',$previousPost->slug.".html") }}">{{ $previousPost->title }}</a>
                        </h4>
                        <small>Publish at : {{ date('Y/m/d h:i a', strtotime($previousPost->created_at)) }}</small>
                        <p>
                            @foreach($previousPost->tags as $tag)
                                <span title="{{ $tag->name }}" style="cursor: pointer;"
                                      class="badge-pill badge-primary badge box-shadown-superdarkblue">#{{ $tag->abbrev }}</span>
                            @endforeach
                        </p>
                        <p>
                            <img src="{{ $previousPost->hinhdaidien }}"
                                 class="image-full-width box-shadown-darkblue scale-onetwo"
                                 alt="{{ $previousPost->title}}">
                        <p class="text-justify">
                            {{ strip_tags(mb_substr($previousPost->description, 0, 150)) }}
                        </p>
                        <a href="{{ route('serie.showBaiViet',$previousPost->slug.".html") }}"
                           class="btn btn-primary text-light no-border-radius out-line-blue">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Xem Típ
                        </a>
                    </div>
                @endforeach
                @foreach($forwardPosts as $forwardPost)
                    <div class="padding-leftright-10 padding-top-10 padding-bottom-10">
                        <div class="shade-blue"></div>
                        <div class="devider-line"></div>
                        <h4 class="text-left font-roboto-light">
                            <a class="blue-text animate-bottom-nocontent"
                               href="{{ route('serie.showBaiViet',$forwardPost->slug.".html") }}">{{ $forwardPost->title }}</a>
                        </h4>
                        <small>Publish at : {{ date('Y/m/d h:i a', strtotime($forwardPost->created_at)) }}</small>
                        <p>
                            @foreach($forwardPost->tags as $tag)
                                <span title="{{ $tag->name }}" style="cursor: pointer;"
                                      class="badge-pill badge-primary badge box-shadown-superdarkblue">#{{ $tag->abbrev }}</span>
                            @endforeach
                        </p>
                        <p>
                            <img src="{{ $forwardPost->hinhdaidien }}"
                                 class="image-full-width box-shadown-darkblue scale-onetwo"
                                 alt="{{ $forwardPost->title}}">
                        <p>
                            {{ strip_tags(mb_substr($forwardPost->description, 0, 150)) }}
                        </p>
                        <a href="{{ route('serie.showBaiViet',$forwardPost->slug.".html") }}"
                           class="btn btn-primary text-light no-border-radius out-line-blue">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Xem Típ
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mt-3 border-top-blue">
            <div class="col">
                <h1 class="text-primary text-center font-roboto-light"> Comment Section !</h1>
                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                    var disqus_config = function () {
                        this.page.url = "{{ request()->url() }}";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = "serie_{{ $post->slug.".html" }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };

                    (function () { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://myownsite-1.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <script id="dsq-count-scr" src="https://myownsite-1.disqus.com/count.js" async></script>
                <script>
                    DISQUSWIDGETS.getCount({reset: true});
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                        powered by Disqus.</a></noscript>
            </div>

        </div>
    </div>
@endsection