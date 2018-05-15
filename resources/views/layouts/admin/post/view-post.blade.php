@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">
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
            <li class="breadcrumb-item">
                @if($type == 'blog')
                    <a href="{{ route('mypost.danhsachblog') }}">Dashboard {{ strtoupper($type) }}</a>
                @elseif($type == 'serie')
                    <a href="{{ route('mypost.danhsachserie') }}">Dashboard {{ strtoupper($type) }}</a>
                @elseif($type == 'chuyende')
                    <a href="{{ route('mypost.danhsachchuyende') }}">Dashboard {{ strtoupper($type) }}</a>
                @endif
            </li>
            <li class="breadcrumb-item">View POST</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">Chi tiết POST có cả CSS</div>
            <div class="card-body no-padding-left-right padding-top-10 background-blue ">
                <div class="row mt-3">
                    <div class="col-md-12 col-lg-12">
                        <div class="card card-no-border box-shadown-darkblue no-border-radius">
                            <div class="card-body no-padding-left-right no-padding-bottom padding-top-10">
                                <h4 class="text-center border-around-blue padding-bottom-10 padding-top-10">Thông tin POST đăt đây!</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Hình đại diện</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Chủ đề</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $post->id }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td title="{{strip_tags($post->description)}}">{{ substr(strip_tags($post->description),0, 30) }}</td>
                                            <td>
                                                @if($post->hinhdaidien != null && $post->hinhdaidien != 'NULL')
                                                    <div>
                                                        <img src="{{$post->hinhdaidien}}" data-toggle="modal"
                                                             data-target="#modalShowImagePost{{$post->id}}" style="width: 50px; height: 40px;">
                                                        <div class="modal" id="modalShowImagePost{{$post->id}}" tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                                                <div class="modal-content no-border-radius">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ $post->hinhdaidien }}" style="width: 100%;height: auto;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{asset('upload/images/notfound1.png')}}" class="rounded"
                                                         style="width: 50px; height: 50px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if($post->status == 'N')
                                                    <button class="btn btn-info box-shadown-darkblue">Writing</button>
                                                @else
                                                    <button class="btn btn-primary box-shadown-darkblue">Publish
                                                        at </button> <span>{{ date('Y/m/d h:ia', strtotime($post->time_publish)) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($post->topic != null)
                                                    <button class="btn btn-info box-shadown-darkblue">{{ $post->topic->title }}</button>
                                                @else
                                                    <button class="btn btn-info box-shadown-darkblue">No Topic Selected.</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a title="Edit Post" href="{{ route('mypost.editpost',['type' => $type,'id' => $post->id]) }}"
                                                   class="btn btn-warning box-shadown-darkblue"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a title="Delete Post" href="{{ route('mypost.delete',['type' => $type,'id' => $post->id]) }}"
                                                   class="btn btn-danger box-shadown-darkblue"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 background-white padding-top-30 border-top-blue "  id="viewPostHidden" >
                    {{--<div class="container padding-leftright-10 sticky-top">--}}
                        {{--<button class="btn btn-primary btn-block  box-shadown-superdarkblue" onclick="closeView(event)">Close This</button>--}}
                    {{--</div>--}}
                    <div class="contentPost container content-post-show" id="contentPost">
                        <h3>{{ $post->id }}</h3>
                        @if( $post->status == "Y" )
                            <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đã xuất bản " ." | ".date('Y-m-d h:iA', strtotime($post->time_publish)) }}</h3>
                        @else
                            <h3 class="text-danger text-center border-around-blue padding-top-10 padding-bottom-10">{{ "Đang viết" }}</h3>
                        @endif

                        <h3>{{ $post->title }}</h3>
                        <p>
                            {!! $post->description !!}
                        </p>
                        <p>
                            <?php echo $post->content; ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection