@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('typepost.index') }}">Danh Sách Kiều Bài Viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa Kiểu bài viết</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header">Chỉnh sửa Kiểu bài viết</div>
            <div class="card-body">
                <form action="{{route('typepost.update',$typepost->id)}}" method="POST" enctype="application/x-www-form-urlencoded">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="text-danger">Tiêu đề :</label>
                        <input class="form-control" name="title" type="text" placeholder="Nhập tiêu đề cho kiểu bài viết" value="{{ $typepost->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-danger"> Miêu tả:</label>
                        <textarea class="form-control" name="description" type="text" placeholder="Thông tin mô tả cho kiểu bài biết" rows="5">{{$typepost->description}}</textarea>
                    </div>
                    <div class="devider-line"></div>
                    <button class="btn btn-outline-primary" type="submit">Lưu Thông Tin</button>
                </form>
            </div>
        </div>
    </div>

@endsection