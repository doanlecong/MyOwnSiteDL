@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm Mới Kiểu Bài Viết</li>
        </ol>
    </nav>
@endsection
@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header ">Thông tin bạn truy cập hiện không có trong hệ thống</div>
        </div>
    </div>
@endsection
