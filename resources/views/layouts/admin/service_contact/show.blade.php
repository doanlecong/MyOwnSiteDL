@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dichvu.index') }}">Danh Sách Chủ Đề</a></li>
            <li class="breadcrumb-item">Thông tin khách liên hệ</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card">
            <div class="card-header card_header_gradient">Thông tin khách liên hệ</div>
            <div class="card-body">
                <p>
                    <a href="{{ route('dichvu.index') }}" class="btn btn-outline-warning text-primary">Danh Sách</a>
                    <a href="{{ route('dichvu.reply',$serviceContact->id) }}" class="btn btn-outline-primary" >Gửi Mail Trả Lời</a>
                </p>
                <div class="devider-line"></div>
                <div class="row">
                    <div class="col">
                        <p>Tên : {{$serviceContact->name}}</p>
                        <p>Email : {{ $serviceContact->email }}</p>
                        <p>Dịch vụ mong muốn : {{ $arrDichVu[$serviceContact->service_name] }}</p>
                        <p>Mô tả : {{ strip_tags($serviceContact->service_description) }}</p>
                        @if($serviceContact->serviceFile)
                            <?php $file = $serviceContact->serviceFile; ?>
                            <p>File Name : {{ $file->file_name }}</p>
                            <p>File Size : {{ $file->file_size }} bytes </p>
                            <p>Foler Save : {{ $file->folder_save }}</p>
                            @if($file->link_external != "NULL")
                                <p>Link External : <a href="{{ $file->link_external }}" >{{ $file->link_external }}</a></p>
                            @endif
                            @if(in_array($file->file_type, $arrImageType))
                                <p><img src="{{route('getFileStoragePrivate',$file->id)}}" data-toggle="modal" data-target="#exampleModalCenter" style="width: 300px;height: auto;"></p>
                                <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Hình Từ Khách Hàng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ route('getFileStoragePrivate',$file->id)}}"style="width: 100%;height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p><a  href="{{ route('getFileStoragePrivate', $file->id) }}" target="_blank">Mở File Bên Cửa Sổ Khác</a></p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection