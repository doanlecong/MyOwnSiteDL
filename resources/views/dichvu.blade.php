@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dịch Vụ</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container dichvu-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary mb-3 dichvu-card">
                    <div class="card-header"><h4 class="text-capitalize text-light text-center">Phát triển <span style="display: inline-block">website</span></h4></div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Thiết kế website chuyên nghiệp</h5>
                        <p class="card-text">Cung cấp cho bạn dịch vụ thiết kế website chuyên nghiệp giá tốt, sự lựa chọn tốt nhất cho bạn, thiết kế website sạch, chuẩn SEO.</p>
                    </div>
                    <div id="dichvu_web_carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 image_dichvu" src="{{ asset('upload/images/web_dichvu_1.jpg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 image_dichvu" src="{{ asset('upload/images/web_dichvu_2.png') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 image_dichvu" src="{{ asset('upload/images/web_dichvu_3.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#dichvu_web_carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#dichvu_web_carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary mb-3 dichvu-card">
                    <div class="card-header"><h4 class="text-capitalize text-light text-center">Phát triển <span style="display: inline-block">ứng dụng di động</span></h4></div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Ứng dụng tuyệt vời mang lại nhiều trải nghiệm tốt cho người dùng</h5>
                        <p class="card-text">Trong sự bùng nổ của công nghệ, ứng dụng điện thoại mang lại nhiều lợi ích cho người dùng khi thế giới luôn luôn trong trạng thái kết nối</p>
                    </div>
                    <div id="dich_vu_mobile_carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_1.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_2.svg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_3.png')}}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#dich_vu_mobile_carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#dich_vu_mobile_carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary mb-3 dichvu-card">
                    <div class="card-header"><h4 class="text-danger text-capitalize text-center text-light">Thiết kế <span style="display: inline-block">logo, banner</span></h4></div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Hãy thể hiện dấu ấn của bạn bằng một logo hay banner chuyên nghiệp</h5>
                        <p class="card-text">Logo hay banner bạn mong muốn sẽ được thiết kế cẩn thận đảm bảo chất lượng cao mà giá thành hợp lý</p>
                    </div>
                    <div id="dich_vu_logo_carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_1.png') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_2.jpg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_3.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_4.jpg') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#dich_vu_logo_carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#dich_vu_logo_carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="devider-line" ></div>
        <h3 class="dichvu_slogan text-center text-capitalize text-primary" style="font-family: Lobster">Điều bạn tìm kiếm từ một dịch vụ</h3>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card">
                    <img class="image-full-width" src="http://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="image-full-width" src="http://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="image-full-width" src="http://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="image-full-width" src="http://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <ul class="list-group">
                <li class="list-group-item active"><img class="image-full-width " src="http://via.placeholder.com/1200x150"></li>
                <li class="list-group-item"><img class="image-full-width " src="http://via.placeholder.com/1200x150"></li>
                <li class="list-group-item"><img class="image-full-width " src="http://via.placeholder.com/1200x150"></li>
                <li class="list-group-item"><img class="image-full-width " src="http://via.placeholder.com/1200x150"></li>
            </ul>
        </div>
        <div class="devider-line"></div>
    </div>
@endsection