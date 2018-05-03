@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sach Mã Tag</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header">Danh Sách Tag</div>
            <div class="card-body">
                <a href="{{ route('tag.create') }}" class="btn btn-outline-primary" >Thêm Mới Tag</a>
                <div class="devider-line"></div>
                @if(count($listTag) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Abbreviation</th>
                            <th>Type Tag</th>
                            <th>Description</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listTag as $tag)
                            <tr>
                                <td>{{ $tag->id}}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->abbrev }}</td>
                                <td>{{ ($tag->type_tag) ? $arrTypeTag[$tag->type_tag] : 'NULL' }} </td>
                                <td>{{ $tag->description }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>
                                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('tag.delete', $tag->id) }}" class="btn btn-danger" onclick="return confirm('Mày có muốn xóa thật không ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $listTag->links(); !!}
                    </div>
                @else
                    <h3>Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>
@endsection