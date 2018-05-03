@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('topic.index') }}">Danh Sách Các Chủ Đề</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa Chủ Đề</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header">Chỉnh sửa Chủ Đề</div>
            <div class="card-body">
                <form action="{{route('topic.update',$topic->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title" class="text-danger">Tiêu đề :</label>
                                <input class="form-control" name="title" type="text" placeholder="Nhập tiêu đề cho kiểu bài viết" required value="{{ $topic->title }}">
                            </div>
                            <div class="col-md-6">
                                <label for="type_post" class="text-danger">Bài Viết Thuộc :</label>
                                <select class="form-control" name="type_post" value="{{ $topic->type_post_id }}">
                                    @foreach($typePosts as $tp)
                                        @if($tp->id == $topic->type_post_id)
                                            <option value="{{ $tp->id }}" selected>{{$tp->title}}</option>
                                        @else
                                            <option value="{{ $tp->id }}">{{$tp->title}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="text-danger">Các Tags :</label>
                        <select class="form-control" name="tags[]" multiple>
                            @foreach($tags as $tg)
                                @if(in_array($tg->id , $arrTagSelected))
                                    <option value="{{ $tg->id }}" selected>{{$tg->abbrev}}--{{$tg->name}}</option>
                                @else
                                    <option value="{{ $tg->id }}">{{$tg->abbrev}}--{{$tg->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-danger"> Miêu tả:</label>
                        <textarea class="form-control" name="description" type="text" placeholder="Thông tin mô tả cho kiểu bài biết" rows="5" required>{{ $topic->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_name" class="text-danger">Hình Đại Diện :</label>
                        <input class="form-control-file" name="image_name" type="file" accept="image/*">
                        @if($topic->image_name != null && $topic->image_name != "NULL" )
                            <img src="{{$topic->image_name}}" class="rounded" style="width: 100px; height: 70px;">
                        @else
                            <img src="{{ asset('upload/images/notfound1.png') }}" style="width: 100px;height: 100px;">
                        @endif

                    </div>
                    <div class="devider-line"></div>
                    <button class="btn btn-outline-primary" type="submit">Lưu Thông Tin</button>
                </form>
            </div>
        </div>
    </div>

@endsection