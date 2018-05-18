@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/vs2015.min.css">
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
            <li class="breadcrumb-item">Dashboard Serie</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">Danh Sách Các Bài Serie</div>
            <div class="card-body no-padding-left-right padding-top-10 background-blue ">
                <div class="row mt-3">
                    <div class="col-md-6 col-lg-6">
                        <div class="card card-no-border box-shadown-darkblue no-border-radius">
                            <div class="card-body no-padding-left-right no-padding-bottom padding-top-10">
                                <div class="haft-left padding-leftright-10">
                                    <h3 class="text-capitalize text-left text-warning border-bottom-bluethin box-shadown-purple-thin no-margin-bottom text-shadown-orange-thin">
                                        <i class="fa fa-bookmark-o" aria-hidden="true"></i> TOPIC</h3>
                                    <p class="text-left dichvu_slogan text-primary text-20 no-margin-bottom">
                                        {{ $countTopic }}
                                        <small> chủ đề</small>
                                    </p>
                                </div>
                                <div class="haft-right padding-leftright-10">
                                    <h3 class="text-capitalize text-left text-warning border-bottom-bluethin box-shadown-purple-thin no-margin-bottom text-shadown-orange-thin">
                                        <i class="fa fa-list-ol" aria-hidden="true"></i> Số Bài viết</h3>
                                    <p class="text-left dichvu_slogan text-primary text-20 no-margin-bottom">
                                        <span>{{ $countPublishSerie }}
                                            <small> bài đã xuất bản</small></span> ||
                                        <span>{{ $countUnpublishSerie }}
                                            <small> đang viết dở</small></span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 background-white padding-top-30 border-top-blue">
                    <div class="col ">
                        <p>
                            <a href="{{ route('mypost.writepost',['type' => $typeSerie]) }}"
                               class="btn btn-warning  box-shadown-darkblue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Viết bài mới</a>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topicserie" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Chủ đề</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#publicserie"
                                   role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check-circle" aria-hidden="true"></i> Bài đăng đã xuất bản</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpublishserie" role="tab"
                                   aria-controls="profile" aria-selected="false"><i class="fa fa-pause" aria-hidden="true"></i> Bài đang viết dở</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="topicserie" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="publicserie" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="unpublishserie" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10    ">
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-3 background-white padding-top-30 border-top-blue" id="viewPostHidden" hidden>
                    <div class="container padding-leftright-10 sticky-top">
                        <button class="btn btn-primary btn-block  box-shadown-superdarkblue" onclick="closeView(event)">
                            Close This
                        </button>
                    </div>
                    <div class="contentPost container" id="contentPost">
                        <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scriptTail')
    <script>
        function getJsonPaginate(url = "", e) {
            var data = "";
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": (url == "") ? "{{ route('dashboard.getblog') }}" : url,
                "method": "GET",
            }

            $.ajax(settings).done(function (response) {
                $(e.target).closest('div').html(response);
                // console.log(response);
            });
        }

        $(document).ready(function () {
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('mypost.tablePost',['typepost' => $typeSerie, 'ispublic' => $publish]) }}",
                "method": "GET",
            }).done(function (data) {
                $('#publicserie').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.gettopicserie') }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicserie').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('mypost.tablePost',['typepost' => $typeSerie, 'ispublic' => $unPublish]) }}",
                "method": "GET",
            }).done(function (data) {
                $('#unpublishserie').html(data);
            });

        })
        $(document).on('click', '.pagination .page-item a', function (e) {
            getJsonPaginate($(this).attr('href'), e);
            e.preventDefault();
        });

        function closeView(event) {
            event.target.parentNode.parentNode.hidden = true;
        }

        $(document).on('click', '.view-now', function (e) {
            // console.log('Helllo');
            var type = "{{ $typeSerie }}";
            var id = $(this).attr('data-id');
            var viewHiddenPost = document.getElementById('viewPostHidden');
            var contentPost = document.getElementById('contentPost');
            viewHiddenPost.hidden = false;
            contentPost.innerHTML = "<div class=\"wrapper-for-loading padding-top-30 padding-bottom-10\">\n" +
                "                            <div class=\"loader\"></div>\n" +
                "                        </div>";
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "/authorized/view-instance-post/" + type + "/" + id,
                "method": "GET",
            }).done(function (data) {
                contentPost.innerHTML = data;
                $("pre > code").each(function () {
                    hljs.highlightBlock(this);
                    hljs.lineNumbersBlock(this);
                })
            })
        });
        $(document).on('click', '.view-post-list', function (e) {
            var type = "{{ $typeSerie }}";
            var id = $(this).attr('data-id');
            var viewHiddenPost = document.getElementById('viewPostHidden');
            var contentPost = document.getElementById('contentPost');
            viewHiddenPost.hidden = false;
            contentPost.innerHTML = "<div class=\"wrapper-for-loading padding-top-30 padding-bottom-10\">\n" +
                "                            <div class=\"loader\"></div>\n" +
                "                        </div>";
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "/authorized/get-list-post/" + type + "/" + id,
                "method": "GET",
            }).done(function (data) {
                console.log(data);
                contentPost.innerHTML = data;
            })
        })
    </script>

@endsection