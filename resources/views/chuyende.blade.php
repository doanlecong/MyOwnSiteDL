@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chuyên Đề</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="row border border-primary pt-md-3 pb-md-3 mb-sm-3">
            <div class="col-sm-4">
                <img src="http://via.placeholder.com/600x600" class="img-fluid" alt="chuyende1">
            </div>
            <div class="col-sm-8">
                <div class="list-group d-flex">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        Xem các bài viết khác cùng chuyên đề
                    </a>
                </div>
            </div>
        </div>
        <div class="row border border-primary pt-md-3 pb-md-3 mb-sm-3">
            <div class="col-sm-8">
                <div class="list-group d-flex">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        Xem các bài viết khác cùng chuyên đề
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <img src="http://via.placeholder.com/600x600" class="img-fluid" alt="chuyende1">
            </div>
        </div>
        <div class="row border border-primary pt-md-3 pb-md-3 mb-sm-3">
            <div class="col-sm-4">
                <img src="http://via.placeholder.com/600x600" class="img-fluid" alt="chuyende1">
            </div>
            <div class="col-sm-8">
                <div class="list-group d-flex">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small><button class="badge badge-pill btn btn-outline-primary">Xem tiếp</button></small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        Xem các bài viết khác cùng chuyên đề
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <img src="http://via.placeholder.com/300x300" class="img-fluid image-full-width">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/300x300" class="img-fluid">
                    </div>
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/300x300" class="img-fluid">
                    </div>
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/300x300" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <h2>kdksadmadkmakjcnvnasovnsiovcnmsvonovnsaovnsinvsdi</h2>
                <h2>kdksadmadkmakjcnvnasovnsiovcnmsvonovnsaovnsinvsdi</h2>
                <h2>kdksadmadkmakjcnvnasovnsiovcnmsvonovnsaovnsinvsdi</h2>
                <h2>kdksadmadkmakjcnvnasovnsiovcnmsvonovnsaovnsinvsdi</h2>
                <h2>kdksadmadkmakjcnvnasovnsiovcnmsvonovnsaovnsinvsdi</h2>
            </div>
        </div>
    </div>
@endsection