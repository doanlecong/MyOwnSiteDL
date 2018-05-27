@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sách Chủ Đề</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">Danh Sách Chủ Đề</div>
            <div class="card-body">
                <a href="{{ route('topic.create') }}" class="btn btn-outline-primary box-shadown-darkblue" >Thêm Mới Chủ Đề</a>
                <div class="devider-line"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item box-shadown-darkblue no-border-radius">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topicBlog" role="tab"
                           aria-controls="home" aria-selected="true"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Blog</a>
                    </li>
                    <li class="nav-item box-shadown-darkblue no-border-radius">
                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#topicSerie"
                           role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check-circle" aria-hidden="true"></i> Serie</a>
                    </li>
                    <li class="nav-item box-shadown-darkblue no-border-radius">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#topicChuyende" role="tab"
                           aria-controls="profile" aria-selected="false"><i class="fa fa-pause" aria-hidden="true"></i> Chuyên đề</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="topicBlog" role="tabpanel"
                         aria-labelledby="home-tab">
                        <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="topicSerie" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="topicChuyende" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                            <div class="loader"></div>
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
                "url": url,
                "method": "GET",
            }
            console.log(e.target);
            console.log($(e.target).closest('.table'));
            $(e.target).closest('table').remove();
            var div = $(e.target).closest('div');
            $(e.target).closest('div').html("<div class=\"wrapper-for-loading padding-top-30 padding-bottom-10\">\n" +
                "                        <div class=\"loader\"></div>\n" +
                "                    </div>");
            $.ajax(settings).done(function (response) {
                div.html(response);
            });
        }
        $(document).ready(function () {
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('topic.getTopic',$typeBlog) }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicBlog').html(data);
            });

            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('topic.getTopic', $typeSerie)}}",
                "method": "GET",
            }).done(function (data) {
                $('#topicSerie').html(data);
            });

            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('topic.getTopic', $typeChuyende) }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicChuyende').html(data);
            });

        });

        $(document).on('click', '.pagination .page-item a', function (e) {
            getJsonPaginate($(this).attr('href'), e);
            e.preventDefault();
        });
    </script>
@endsection
