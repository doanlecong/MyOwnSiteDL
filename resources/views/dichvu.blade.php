@extends('layouts.app')

@section('title')
    {{ " | Dịch vụ mà bạn đang có nhu cầu" }}
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dịch Vụ</li>
        </ol>
    </nav>
@endsection

@section('superlink')
@endsection

@section('content')

    <div class="container dichvu-content border-top-blue no-padding-left-right no-padding-top no-padding-bottom">
        @if ($errors->any())
            <div class="devider-line"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="devider-line"></div>
            <div class="alert alert-success" role="alert">
                <strong>Success:</strong> {{ Session::get('success') }}
            </div>
        @endif
        <div id="dichvuchungtoi" class="background_orange border-top-orange padding-top-10 padding-bottom-40"
             style="background-color: orange;">
            <h1 class="text-center text-light padding-bottom-10 font-lobster text-shadown-orange">Dịch vụ chúng tôi cung
                cấp</h1>
            <div class="row" style="font-family: Roboto; font-weight: 300;">
                <div class="col-md-4">
                    <div class="card mb-3 box-shadow-orange dichvu-card card-no-border background-tranparent-100">
                        <div class="background-gradient-orange-violet card-header no-border-radius"><h4
                                    class="text-capitalize text-center text-light text-shadown-orange-thin">Phát triển <span
                                        style="display: inline-block">website</span></h4></div>
                        <div class="card-body text-primary background-white">
                            <h5 class="card-title text-primary">Thiết kế website chuyên nghiệp</h5>
                            <p class="card-text text-justify">Cung cấp cho bạn dịch vụ thiết kế website chuyên nghiệp
                                giá tốt, sự lựa chọn tốt nhất cho bạn, thiết kế website sạch, chuẩn SEO.</p>
                        </div>
                        <div id="dichvu_web_carousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 image_dichvu"
                                         src="{{ asset('upload/images/web_dichvu_1.jpg') }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 image_dichvu"
                                         src="{{ asset('upload/images/web_dichvu_2.jpg') }}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 image_dichvu"
                                         src="{{ asset('upload/images/web_dichvu_3.jpg') }}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#dichvu_web_carousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#dichvu_web_carousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 scale-onetwo dichvu-card card-no-border background-tranparent-100">
                        <div class="card-header  background-gradient-orange-violet no-border-radius"><h4
                                    class="text-capitalize text-light text-center text-shadown-orange-thin ">Phát triển
                                <span style="display: inline-block">ứng dụng di động</span></h4></div>
                        <div class="card-body text-primary background-white">
                            <h5 class="card-title">Ứng dụng tuyệt vời mang lại nhiều trải nghiệm tốt cho người dùng</h5>
                            <p class="card-text text-justify">Trong sự bùng nổ của công nghệ, ứng dụng điện thoại mang
                                lại nhiều lợi ích cho người dùng khi thế giới luôn luôn trong trạng thái kết nối</p>
                        </div>
                        <div id="dich_vu_mobile_carousel" class="carousel slide carousel-fade background-tranparent" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_1.jpg')}}"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_2.svg')}}"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('upload/images/mobile_dichvu_3.png')}}"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#dich_vu_mobile_carousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#dich_vu_mobile_carousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 box-shadow-orange dichvu-card card-no-border background-tranparent-100">
                        <div class="card-header background-gradient-orange-violet no-border-radius"><h4
                                    class="text-danger text-capitalize text-center text-light text-shadown-orange-thin ">
                                Thiết kế <span style="display: inline-block">logo, banner</span></h4></div>
                        <div class="card-body text-primary background-white">
                            <h5 class="card-title">Hãy thể hiện dấu ấn của bạn bằng một logo hay banner chuyên
                                nghiệp</h5>
                            <p class="card-text text-justify">Logo hay banner bạn mong muốn sẽ được thiết kế cẩn thận
                                đảm bảo chất lượng cao mà giá thành hợp lý</p>
                        </div>
                        <div id="dich_vu_logo_carousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_1.png') }}"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_2.jpg') }}"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_3.jpg') }}"
                                         alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('upload/images/logo_dichvu_4.jpg') }}"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#dich_vu_logo_carousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#dich_vu_logo_carousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shade-orange"></div>
        <div id="taisao-card" class="background_blue border-top-blue"
             style="padding: 20px 0px; background-color: #5c7fff">
            <h3 class="text-center text-capitalize text-light font-lobster text-shadown-blue">Điều bạn tìm kiếm từ một
                dịch vụ</h3>
            <div class="row mt-3">
                <div class="col-md-6 col-lg-3">
                    <div class="card card-no-border box-shadown-darkblue">
                        <img class="image-full-width scale-onetwo" src="{{ asset('upload/images/chatluong_slogan_5.png') }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h3 style="font-family: Lobster;" class="text-capitalize text-center text-warning">Make it
                                easy</h3>
                            <p class="card-text text-center dichvu_slogan text-primary"
                               style="font-family: Lobster;font-size: large">Việc sở hữu một website thực sự trở nên dễ
                                dàng và đúng theo ý muốn của bạn . Với kinh nghiệm tham gia nhiều dự án lớn nhỏ khác
                                nhau , chúng tôi luôn mang đến cho bạn điều bạn mong muốn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card card-no-border box-shadown-darkblue">
                        <img class="image-full-width scale-onetwo" src="{{ asset('upload/images/chatluong_slogan_1.png') }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h3 style="font-family: Lobster;" class="text-capitalize text-center text-warning">High
                                quality</h3>
                            <p class="card-text text-center dichvu_slogan text-primary"
                               style="font-family: Lobster;font-size: large">Việc đảm bảo chất lượng sản phẩm là ưu tiên
                                tối quan trọng trong quá trình xây dựng website cũng như ứng dụng của bạn. Với mỗi dự án
                                đều được kiểm tra kĩ càng đảm bảo chất lượng cao khi đến tay bạn</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card card-no-border box-shadown-darkblue">
                        <img class="image-full-width scale-onetwo" src="{{ asset('upload/images/chatluong_slogan_3.jpg') }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h3 style="font-family: Lobster;" class="text-capitalize text-center text-warning">Money
                                saving</h3>
                            <p class="card-text text-center dichvu_slogan text-primary"
                               style="font-family: Lobster; font-size: large">Đến với chúng tôi, bạn sẽ được nhận được
                                sản phẩm ưng ý với giá thành hợp lý, tiết kiệm mà vẫn đảm bảo các yêu cầu chất lượng cho
                                bạn. Với chúng tôi sự hài lòng của bạn là điều chúng tôi tìm kiếm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card card-no-border box-shadown-darkblue">
                        <img class="image-full-width scale-onetwo" src="{{ asset('upload/images/chatluong_slogan_2.jpg') }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h3 style="font-family: Lobster;" class="text-capitalize text-center text-warning">Long term
                                support</h3>
                            <p class="card-text text-center dichvu_slogan text-primary"
                               style="font-family: Lobster; font-size: large">Chăm sóc khách hàng là một trong những thế
                                mạnh của chúng tôi, bạn hoàn toàn có yên tâm rằng sản phẩm của bạn sẽ luôn được hỗ trợ
                                tận tình từ chính chúng tôi trong quá trình sử đụng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shade-orange"></div>
    </div>
    <div id="thanhqua" class="container-fluid" style="background-color: white; padding: 0px;">
        {{-- Danh cho giao dien nam ngang phai tai sao --}}
        <div id="taisao" class="border-top-blue">
            <div class="bg-blue"></div>
            <div class="bg-image image_taisao_1" id="image_slogan"></div>
            <div class="auto-container no-padding-left-right">
                <div class="row clearfix">
                    <div class="col-sm-6 col-lg-6 col-xs-12">
                        <h1 class="text-center text-capitalize text-light font-lobster text-shadown-blue">Điều bạn tìm
                            kiếm từ một dịch vụ</h1>
                        <div class="devider-line"></div>
                        <div class="row mt-3">
                            <div class="block" data-content="1">
                                <div class="row">
                                    <div class="col-4 no-padding-left-right">
                                        <img src="{{ asset('upload/images/chat_luong_easy.jpg') }}"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-light text-left font-lobster padding-top-10">Make it easy</h4>
                                        <p class="text-left dichvu_slogan text-light font-roboto-light">
                                            Việc sở hữu một website thực sự trở nên dễ dàng và đúng theo ý muốn của bạn.
                                            Với kinh nghiệm tham gia nhiều dự án lớn nhỏ khác nhau , chúng tôi luôn mang
                                            đến cho bạn điều bạn mong muốn.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="block" data-content="2">
                                <div class="row">
                                    <div class="col-4 no-padding-left-right">
                                        <img src="{{ asset('upload/images/chatluong_slogan_1.png') }}"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-light text-left font-lobster padding-top-10">High quality</h4>
                                        <p class="text-left dichvu_slogan text-light font-roboto-light">
                                            Việc đảm bảo chất lượng sản phẩm là ưu tiên tối quan trọng trong quá trình
                                            xây dựng website cũng như ứng dụng của bạn.
                                            Với mỗi dự án đều được kiểm tra kĩ càng đảm bảo chất lượng cao khi đến tay
                                            bạn
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="block" data-content="3">
                                <div class="row">
                                    <div class="col-4 no-padding-left-right">
                                        <img src="{{ asset('upload/images/chatluong_slogan_3.jpg') }}"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-light text-left font-lobster padding-top-10">Money saving</h4>
                                        <p class="text-left dichvu_slogan text-light font-roboto-light">
                                            Đến với chúng tôi, bạn sẽ được nhận được sản phẩm ưng ý với giá thành hợp
                                            lý, tiết kiệm mà vẫn đảm bảo các yêu cầu chất lượng cho bạn.
                                            Với chúng tôi sự hài lòng của bạn là điều chúng tôi tìm kiếm
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="block" data-content="4">
                                <div class="row">
                                    <div class="col-4 no-padding-left-right">
                                        <img src="{{ asset('upload/images/chatluong_slogan_2.jpg') }}"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-light text-left font-lobster padding-top-10">Long term
                                            support</h4>
                                        <p class="text-left dichvu_slogan text-light font-roboto-light">
                                            Chăm sóc khách hàng là một trong những thế mạnh của chúng tôi,
                                            bạn hoàn toàn có yên tâm rằng sản phẩm của bạn sẽ luôn được hỗ trợ tận tình
                                            từ chính chúng tôi trong quá trình sử đụng.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- Het phan giao dien nam ngang cua phan tai sao --}}
        <div class="shade-blue"></div>
        <div id="duandalam_dichvu" class="duandalam_dichvu border-top-purple border-bottom-purple background-purple"
             style="padding: 20px;">
            <h1 class="dichvu_slogan text-center text-capitalize text-light font-lobster text-shadown-purple">Những dự
                án đã được hiện thực</h1>
            <h3 class="text-center font-lobster yellow-text text-shadown-purple">
                ***************************************</h3>
            <div class="row mt-3">
                <div class="col-lg" id="paralax_duan">
                    <div id="title" class="slide header">
                        <h1>Pure CSS Parallax</h1>
                    </div>

                    <div id="slide1" class="slide">
                        <div class="title">
                            <h1>Slide 1</h1>
                            <p>Lorem ipsum dolor sit amet, in velit iudico mandamus sit, persius dolorum in per,
                                postulant mnesarchum cu nam. Malis movet ornatus id vim, feugait detracto est ea, eam
                                eruditi conceptam in. Ne sit explicari interesset. Labores perpetua cum at. Id viris
                                docendi denique vim.</p>
                        </div>
                    </div>

                    <div id="slide2" class="slide">
                        <div class="title">
                            <h1>Slide 2</h1>
                            <p>Lorem ipsum dolor sit amet, in velit iudico mandamus sit, persius dolorum in per,
                                postulant mnesarchum cu nam. Malis movet ornatus id vim, feugait detracto est ea, eam
                                eruditi conceptam in. Ne sit explicari interesset. Labores perpetua cum at. Id viris
                                docendi denique vim.</p>
                        </div>
                        <img src="{{ asset('upload/images/taisao_1.jpg') }}">
                        <img src="{{ asset('upload/images/taisao_2.png') }}">
                    </div>

                    <div id="slide3" class="slide">
                        <div class="title">
                            <h1>Slide 3</h1>
                            <p>Lorem ipsum dolor sit amet, in velit iudico mandamus sit, persius dolorum in per,
                                postulant mnesarchum cu nam. Malis movet ornatus id vim, feugait detracto est ea, eam
                                eruditi conceptam in. Ne sit explicari interesset. Labores perpetua cum at. Id viris
                                docendi denique vim.</p>
                        </div>
                    </div>

                    <div id="slide4" class="slide header">
                        <h1>The End</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="shade-purple"></div>
    <div id="feedback"
         class="container dichvu-content border-top-blue no-padding-left-right no-padding-top no-padding-bottom">
        <div class="background-blue" style="padding: 20px 0px;">
            <h3 class="text-capitalize blue-text font-lobster text-center text-light text-shadown-blue">Khách hàng phản
                hồi</h3>
            <div class="row mt-3 feedback-khachhang">
                <div id="feedback-carousel" class="carousel slide carousel-fade feedback-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('upload/images/kh-feedback_1.jpg') }}" alt="KhachhangImage"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-sm-8">
                                        <table class="table ">
                                            <thead>
                                            <th>
                                                <p class="font-roboto-light">
                                                    Mình là một nhiếp ảnh gia nghiệp cmn dư . Thật may mắn cho mình là
                                                    trên mạng có rất nhiều nơi làm web ,
                                                    mà không biết nên chọn ai , may thay có người quen giới thiệu cho
                                                    mình đến với trang .
                                                    Các bạn tại đây hết sức nhiệt tình , luôn sẵn sàng tư vấn cho mình.
                                                    Nhờ đó mà mình đã có một trang web cho cá nhân vô cùng ưng ý .
                                                    Cám ơn rất nhiều.
                                                </p>

                                            </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('upload/images/kh-feedback_2.png') }}" alt="KhachhangImage"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-sm-8">
                                        <table class="table  ">
                                            <thead>
                                            <th>
                                                <p class="font-roboto-light">
                                                    Mình mới mở cửa hàng bán tóc giả . Đang lúc cần một website để phục
                                                    vụ nhu cầu bán hàng của mình thay
                                                    vì sử dụng facebook để quảng cáo, thì mình biết được các bạn bên
                                                    trang đây . Giờ thì công việc bán hàng của mình đã trở nên
                                                    thật tuyệt từ khi có được trang web được các bạn đây thiết kế. Cám
                                                    ơn các bạn nhiều . Chúc trang gặp nhiều thành công.
                                                </p>

                                            </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('upload/images/kh-feedback_3.jpg') }}" alt="KhachhangImage"
                                             class="image-full-width">
                                    </div>
                                    <div class="col-sm-8">
                                        <table class="table">
                                            <thead>
                                            <th>
                                                <p class="font-roboto-light">
                                                    Gia đình có mở một quán ăn . Nhờ vào trang web đặt bên đây mà quán
                                                    ăn gia đình chú ngày càng đông khách.
                                                    Khách đến luôn biết được mình sẽ được ăn gì hôm nay , giá cả luôn
                                                    được cập nhật , các phản hồi góp ý kiến
                                                    của thực khách về cho quán được quản lý rất tốt. Hiện chú đang có kế
                                                    hoạch nâng cấp website để thực sự phục vụ tốt
                                                    hơn cho thực khách . Và chắc chắn , gia đình chú lại mong được các
                                                    bạn bên trang đây giúp đỡ.
                                                </p>
                                            </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#feedback-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#feedback-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="lienhe" class="card">
            <div class="card card-no-border">
                <div class="card-header background-blue text-center text-light font-lobster card-no-border">
                    <h2 class="text-shadown-lightblue">Hãy để lại mong muốn của bạn</h2>
                </div>
                <div class="card-body no-padding-bottom">
                    <h5 class="card-title">Thông tin liên hệ dịch vụ</h5>
                    <p>
                        Đây là form giúp bạn để lại thông tin khi bạn có nhu cầu về dịch vụ mà bên chúng tôi cung cấp.
                    </p>
                    <p><span class="text-danger">*</span> Bạn có thế liên hệ trực tiếp thông qua số điện thoại cuối
                        trang hay gửi email về cho chúng tôi.</p>
                </div>
            </div>
            <div class="padding-around no-padding-top">
                <form method="POST" id="formDichVu" enctype="multipart/form-data" onsubmit="return validateForm();">
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Tên của bạn<span class="text-xl-center text-danger">*</span> : </label>
                        <input type="text" class="form-control" id="name_nguoi" name="name_nguoi"
                               placeholder="Tên của bạn" style="border-bottom-width: 4px;"
                               title="Hãy nhập chữ kèm khoảng trắng.VD : Nguyễn Văn A" required>
                        <p>Vui lòng gửi mình tên đầy đủ của bạn</p>
                    </div>
                    <div class="row" style="margin-left: -15px;margin-right: -15px;">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email">Email của bạn <span class="text-xl-center text-danger">*</span>
                                    :</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="youremail@mail.com" style="border-bottom-width: 4px;"
                                       title="Vd: levana@gmail.com" required
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Email</p>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email1">Xác nhận email <span class="text-xl-center text-danger">*</span>
                                    :</label>
                                <input type="email" class="form-control" id="email1" name="emailconfirm"
                                       placeholder="youremail@mail.com" style="border-bottom-width: 4px;"
                                       title="Vd: levana@gmail.com" required
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <p>Xác nhận email</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dich_vu">Xác nhận email <span class="text-xl-center text-danger">*</span> :</label>
                        <select class="form-control" name="dich_vu" id="dich_vu" title="Dịch vụ bạn mong muốn"
                                style="border-bottom-width: 4px;">
                            <option>-- Mời Chọn Dịch Vụ --</option>
                            <option value="1">Thiết Kế Phát Triển WebSite</option>
                            <option value="2">Phát triển Ứng Dụng Di Động</option>
                            <option value="3">Thiết Kế Logo , Banner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung <span class="text-xl-center text-danger">*</span> :</label>
                        <textarea class="form-control" rows="3" required
                                  style="resize: vertical; min-height: 100px; border-bottom-width: 4px;"
                                  placeholder="Thông tin bạn muốn gửi" id="content" name="content_dichvu"></textarea>
                        <p>Hãy mô tả thông tin mà bạn cần liên hệ</p>
                    </div>
                    <div class="form-group">
                        <label for="file_mota">Bạn có thể gửi cho bên mình file mô tả nếu muốn.</label>
                        <input class="form-control-file" type="file" name="file_mota" id="file_mota"
                               style="border-bottom-width: 4px;">
                    </div>
                    <div class="form-group">
                        <label for="file_mota">Ngoài ra, bạn có thể để lại link đến thư mục tài liệu của bạn :</label>
                        <input class="form-control" type="url" id="link_external" name="link_external"
                               style="border-bottom-width: 4px;">
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary box-shadown-superdarkblue">Gửi Thông Tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('addScript')
    <script>
        function validateForm() {
            var name = document.getElementById('name_nguoi');
            var email = document.getElementById('email');
            var email1 = document.getElementById('email1');
            var dich_vu = document.getElementById('dich_vu');
            var content = document.getElementById('content');
            var file_mota = document.getElementById('file_mota');
            var link_external = document.getElementById('link_external');

            if (name.value == "") {
                name.focus();
                // console.log('chay valid form NAME ');
                name.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Bạn Thiếu Điền Tên Của Bạn Rồi.",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                name.focus();
                return false;
            } else {
                name.style.borderBottom = " 4px solid dodgerblue";
            }
            if (email.value == "") {
                // console.log('chay valid form Email ');
                email.style.borderBottom = " 4px solid red";
                return false;
            }
            if (email1.value == "") {
                // console.log('chay valid form Email1 ');
                email1.style.borderBottom = " 4px solid red";
                return false;

            }
            if (dich_vu.value == "" || ['1', '2', '3'].indexOf(dich_vu.value) == -1) {
                dich_vu.focus();
                dich_vu.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Bạn ơi ;> Nhớ chọn dịch vụ nào nhá.",
                    icon: "error",
                    button: "Điền Tiếp",
                });
                return false;
            } else {
                dich_vu.style.borderBottom = " 4px solid dodgerblue";
            }
            if (content.value == "") {
                content.focus();
                content.style.borderBottom = " 4px solid red";
                return false;
            } else {
                content.style.borderBottom = " 4px solid dodgerblue";
            }
            if (email1.value != email.value) {
                email1.focus();
                email.style.borderBottom = " 4px solid red";
                email1.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Có vẻ như email của bạn không dồng nhất với nhau",
                    icon: "error",
                    button: "Điền Tiếp",
                });
                return false;
            } else {
                email.style.borderBottom = " 4px solid dodgerblue";
                email1.style.borderBottom = " 4px solid dodgerblue";

            }
            if (file_mota.value != "" && file_mota.files[0].size > 3145728) {
                file_mota.value = "";
                file_mota.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Xin lỗi . File bạn gửi có dung lượng lớn quá(max: 3MB) ! Bạn có thể gửi file thông qua nhập link liên kết bên dưới.",
                    icon: "error",
                    button: "Điền Tiếp",
                });
                return false;
            }
            var formData = new FormData();
            formData.append('name_nguoi', name.value);
            formData.append('email', email.value);
            formData.append('dich_vu', dich_vu.value);
            formData.append('content_dichvu', content.value);
            formData.append('link_external', link_external.value);
            if (file_mota.value != "") {
                formData.append('file_mota', file_mota.files[0]);
            }
            $.ajax({
                url: '{{ route('dichvu.store') }}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    swal({
                        title: "Thank you!",
                        text: data.msg,
                        icon: "success",
                        button: "Tắt nó !",
                    });

                },
                error: function (e) {
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.msg,
                        icon: "error",
                        button: "Tắt nó !",
                    });
                }
            }).then(function () {
                var formDichvu = document.getElementById('formDichVu');
                formDichvu.reset();
            });
            return false;
        }
    </script>
    <script>
        $(document).ready(function (e) {
            $('.block').click(function () {
                console.log('RUNNING !');
                // console.log($(this).attr('data-content'));
                var id = $(this).attr('data-content');
                $('#image_slogan').removeClass('image_taisao_1')
                    .removeClass('image_taisao_2')
                    .removeClass('image_taisao_3')
                    .removeClass('image_taisao_4')
                    .addClass('image_taisao_' + id);
            })
        })
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection