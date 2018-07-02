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
    <div class="col-lg no-padding-left-right">
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
                            <th>Time</th>
                            <th>Read</th>
                            <th>Reply</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myServiceContact as $service)
                            <tr id="row{{$service->id }}">
                                <td>{{ $service->id}}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->email }}</td>
                                <td>{{ $serviceName[$service->service_name] }}</td>
                                <td>{{ substr(" ".$service->service_description,0 ,30) }}</td>
                                <td>
                                    @if($service->serviceFile)
                                        @if(in_array($service->serviceFile->file_type, $arrImage))
                                            <div><img src="{{ route('getFileStoragePrivate',$service->serviceFile->id) }}" data-toggle="modal" data-target="#modalShowImage{{$service->serviceFile->id}}" style="width: 30px;height: 30px;"/>
                                                <div class="modal" id="modalShowImage{{$service->serviceFile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Hình Từ Khách Hàng</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ route('getFileStoragePrivate',$service->serviceFile->id)}}"style="width: 100%;height: auto;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    {{ $service->created_at }}
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
                                    <button class="btn btn-danger  box-shadown-superdarkblue" onclick="deleteLienHe({{$service->id}})"><i class="fa fa-trash"></i></button>
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
@section('scriptTail')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteLienHe(id) {
            // event.stopPropagation();
            swal({
                title: "Muốn xóa hả mày ?",
                text: "Một khi mày xóa thì éo có lấy lại được đâu con chóa !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((value) => {
                if (value) {
                    $.ajax({
                        url: "/authorized/delete_dich_vu/" + id ,
                        type: "GET",
                        success: function (data) {
                            if (data.success == true) {
                                swal({
                                    title: "Success !",
                                    text: data.msg,
                                    icon: "success",
                                    button: "Đóng thôi !",
                                });
                                var tr = document.getElementById('row' + id);
                                var tbody = tr.parentNode;
                                tbody.removeChild(tr);
                            } else {

                            }
                        },
                        error: function (e) {
                            swal({
                                title: "Opp !",
                                text: e.responseJSON.msg,
                                icon: "error",
                                button: "Đóng thôi !",
                            });
                        }
                    })
                } else {
                    swal({
                        title: "Mày rảnh vậy !!",
                        icon: "info",
                        button: "Tắt đi con chóa!",
                        closeOnClickOutside: false
                    });
                }
            })

        }
    </script>
@endsection
