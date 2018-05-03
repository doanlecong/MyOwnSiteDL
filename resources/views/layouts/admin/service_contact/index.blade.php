@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Sách Các Liên Hệ Dịch Vụ</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg">
        <div class="card">
            <div class="card-header card_header_gradient">Danh Sách Các Liên Hệ Dịch Vụ</div>
            <div class="card-body">
                <div class="devider-line"></div>
                @if(count($myServiceContact) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Service Name</th>
                            <th>Service Description</th>
                            <th>File</th>
                            <th>Link External</th>
                            <th>Read</th>
                            <th>Reply</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myServiceContact as $service)
                            <tr>
                                <td>{{ $service->id}}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->email }}</td>
                                <td>{{ $serviceName[$service->service_name] }}</td>
                                <td>{{ substr(" ".$service->service_description,0 ,30) }}</td>
                                <td>
                                    @if($service->serviceFile)
                                        @if(in_array($service->serviceFile->file_type, $arrImage))
                                            <div><img src="{{ route('getFileStoragePrivate',$service->serviceFile->id) }} " style="width: 30px;height: 30px;"/></div>
                                        @else
                                            {{ $service->serviceFile->file_name }}
                                        @endif
                                        {{--<div><img src="{{ route('getImageStoragePrivate', $service->serviceFile->id) }}"></div>--}}
                                    @else
                                        {{ "NULL" }}
                                    @endif
                                </td>
                                <td>
                                    @if($service->serviceFile && $service->serviceFile->link_external != "NULL" )
                                        <a href="{{ htmlspecialchars($service->serviceFile->link_external)}}">{{ htmlspecialchars($service->serviceFile->link_external)}}</a>
                                    @else
                                        {{ "NULL" }}
                                    @endif
                                </td>
                                <td>
                                    @if($service->is_read == 'N')
                                        {{ "Chưa đọc" }}
                                    @else
                                        {{ "Đã đọc" }}
                                    @endif
                                </td>
                                <td>
                                    @if($service->is_reply == 'N')
                                        {{ "Chưa trả lời" }}
                                    @else
                                        {{ "Đã tră lời" }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('dichvu.show', $service->id)}}" class="btn btn-warning">View</a>
                                    <a href="{{route('dichvu.delete', $service->id) }}" class="btn btn-danger" onclick="return confirm('Mày có muốn xóa thật không ?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $myServiceContact->links(); !!}
                    </div>
                @else
                    <h3>Hiện Chưa có dữ liệu nào trong bảng</h3>
                @endif
            </div>
        </div>
    </div>
@endsection