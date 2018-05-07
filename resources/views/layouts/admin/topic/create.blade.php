@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('topic.index') }}">Danh Sách Các Chủ Đề</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm Mới Chủ Đề</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card">
            <div class="card-header card_header_gradient">Thêm mới Chủ Đề</div>
            <div class="card-body">
                <form action="{{route('topic.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title" class="text-danger">Tiêu đề :</label>
                                <input class="form-control" name="title" type="text" placeholder="Nhập tiêu đề cho kiểu bài viết" required>
                            </div>
                            <div class="col-md-6">
                                <label for="type_post" class="text-danger">Bài Viết Thuộc :</label>
                                <select class="form-control" name="type_post">
                                    @foreach($typePosts as $tp)
                                        <option value="{{ $tp->id }}">{{$tp->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="text-danger">Các Tags :</label>
                        <select class="form-control" name="tags[]" multiple>
                            @foreach($tags as $tg)
                                <option value="{{ $tg->id }}">{{$tg->abbrev}}--{{$tg->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-danger"> Miêu tả:</label>
                        <textarea class="form-control" name="description" type="text" placeholder="Thông tin mô tả cho kiểu bài biết" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_name" class="text-danger">Hình Đại Diện :</label>
                        <input class="form-control-file" name="image_name" type="file" accept="image/*">
                    </div>
                    <div class="devider-line"></div>
                    <button class="btn btn-outline-primary" type="submit">Lưu Thông Tin</button>
                </form>
            </div>
        </div>
    </div>

@endsection