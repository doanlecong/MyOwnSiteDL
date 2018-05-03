@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sách Kiều Bài Viết</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header">Danh Sách Kiểu Bài Viết</div>
            <div class="card-body">
                <a href="typepost/create" class="btn btn-outline-primary" >Thêm mới Kiểu Bài viết</a>
                <div class="devider-line"></div>
                @if(count($listTypePost) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listTypePost as $typepost)
                            <tr>
                                <td>{{ $typepost->id}}</td>
                                <td>{{ $typepost->title }}</td>
                                <td>{{ $typepost->description }}</td>
                                <td>{{ $typepost->created_at }}</td>
                                <td>
                                    <a href="{{route('typepost.edit', $typepost->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('typepost.delete', $typepost->id) }}" class="btn btn-danger" onclick="return confirm('Mày có muốn xóa thật không ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>

@endsection