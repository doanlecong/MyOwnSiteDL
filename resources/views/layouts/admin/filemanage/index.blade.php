@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sách File Đang Được Sử Dụng</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header card_header_gradient">Danh Sách File Đang Được Sử Dụng</div>
            <div class="card-body">
                {{--<a href="{{ route('topic.create') }}" class="btn btn-outline-primary" >Thêm Mới Chủ Đề</a>--}}
                <div class="devider-line"></div>
                @if(count($fileManage) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>File Name</th>
                            <th>File Path</th>
                            <th>File Type</th>
                            <th>File Size(Bytes)</th>
                            <th>Image Size</th>
                            <th>Purpose</th>
                            <th>Created From</th>
                            <th>External ID</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fileManage as $file)
                            <tr>
                                <td>{{ $file->id}}</td>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->filepath }}</td>
                                <td>{{ $file->file_type }}</td>
                                <td>{{ $file->file_size }}</td>
                                <td>{{ $file->image_size }}</td>
                                <td>{{ $file->purpose }}</td>
                                <td>{{ $file->controller_name }}</td>
                                <td>{{ $file->external_id }}</td>
                                <td>{{ date('Y-m-d h:i A', strtotime($file->created_at)) }}</td>
                                <td>
                                    <a href="{{route('file-management.edit', $file->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('file-management.delete', $file->id) }}" class="btn btn-danger" onclick="return confirm('Mày có muốn xóa thật không ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $fileManage->links(); !!}
                    </div>
                @else
                    <h3>Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>
@endsection