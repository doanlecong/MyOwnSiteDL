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
                @if(count($myTopic) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Belong To</th>
                            <th>Representive Image</th>
                            <th>Taggable</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myTopic as $topic)
                            <tr>
                                <td>{{ $topic->id}}</td>
                                <td title="{{ $topic->title }}">{{ mb_substr($topic->title,0, 30) }}</td>
                                <td><span title="{{ $topic->description }}">{{ mb_substr(strip_tags($topic->description), 0, 50) }} {{ strlen($topic->description) > 50 ? "..." : "" }}</span></td>
                                {{--<td>{{ substr($topic->description, 0, 50) }}</td>--}}
                                <td title="{{$topic->slug}}">{{ substr($topic->slug,0, 20) }}</td>
                                <td><span class="btn btn-outline-primary box-shadown-darkblue" >{{ $topic->typePost->title }}</span></td>
                                <td>
                                    @if($topic->image_name != null && $topic->image_name != 'NULL')
                                        <div>
                                            <img src="{{$topic->image_name}}" data-toggle="modal" data-target="#modalShowImage{{$topic->id}}" style="width: 50px; height: 40px;">
                                            <div class="modal" id="modalShowImage{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                                    <div class="modal-content no-border-radius">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ $topic->image_name }}"style="width: 100%;height: auto;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{asset('upload/images/notfound1.png')}}" class="rounded" style="width: 50px; height: 50px;">
                                    @endif
                                </td>
                                <td>
                                    @foreach($topic->tags as $tag)
                                        <span class="badge badge-pill badge-primary" title="{{ $tag->description }}" style="cursor: pointer;">{{ $tag->abbrev }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $topic->created_at }}</td>
                                <td>
                                    <a href="{{route('topic.edit', $topic->id)}}" class="btn btn-warning box-shadown-superdarkblue">Edit</a>
                                    <a href="{{route('topic.delete', $topic->id) }}" class="btn btn-danger box-shadown-superdarkblue" onclick="return confirm('Mày có muốn xóa thật không ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $myTopic->links(); !!}
                    </div>
                @else
                    <h3>Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>
@endsection