@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ " | Một chút về bản thân tác giả" }}
@endsection
@section('content')
    <div class="container-fluid border-top-blue no-padding-top no-padding-left-right">

        <div class="row text-center background-darkblue text-light padding-around" id="thongtinbanthan">
            <div class="container background-tranparent padding-around-20">
                <div class="col-sm-12 text-center padding-top-20 padding-bottom-40"  data-aos="fade-up">
                    <img class="rounded-circle embed-responsive my-image" style="width: 300px; margin: 0 auto;" src="{{ asset('upload/images/myseft.jpg') }}" alt="My Image">
                </div>
                <div class="col-sm-12 background-tranparent padding-around-20"  data-aos="fade-up">
                    <h1 class="display-5 text-left mt-5 mb-5">
                        <span class="background-aninate-blue-purple padding-around-20  font-weight-bold" style="-webkit-border-radius: 40px;-moz-border-radius: 40px;border-radius: 40px; font-family: 'Courier New', Courier, monospace;">DOAN</span> LE</h1>
                    <hr>
                    <p class="font-roboto-light text-left text-shadown-black">
                        <i class="fa fa-star fa-3x blue-text " aria-hidden="true" style="width: 80px;"></i> Hobbies :
                        Bong da , cau long, boi loi, doc sach, nghe nhac , xem phim
                    </p>
                    <hr>
                    <p class="font-roboto-light text-left text-shadown-black">
                        <i class="fa fa-trophy yellow-text fa-3x" aria-hidden="true" style="width: 80px;"></i> My Degree : I have been graduated in Ho Chi Minh City University of Technology (Bach Khoa TP.HCM)
                    </p>
                    <hr>
                    <p class="font-roboto-light text-left text-shadown-black">
                        <i class="fa fa-address-card-o fa-3x purple-text" aria-hidden="true" style="width: 80px;"></i> My Professional : My major is Computer Science
                    </p>
                    <hr>
                    <p class="font-roboto-light text-left text-shadown-black">
                        <i class="fa fa-handshake-o fa-3x" aria-hidden="true" style="width: 80px;"></i> Working in : Web Developer , Mobile App Developer ( Android is my love) , Software Developer
                    </p>
                </div>
                <div class="col mt-5 background-tranparent padding-around-20 " data-aos="fade-up">
                    <p class="text-left quote-pagrap font-lobster text-justify text-shadown-black text-20">
                        Trang web này là một blog cá nhân , nơi mình đăng những thứ mình tìm hiểu để tự củng cố kiến thức , kĩ năng cho bản thân , cũng như chia sẻ kiến thức cho bất cứ ai . Mình hoạt động hoàn
                        toàn trên tinh thần chia sẻ để nhận lại , bạn chắc chắn sẽ không thấy trang mình có bất cứ một thông tin nào mang tính quảng cáo . Nếu có thì cứ coi như là không đi ha :D
                    </p>
                </div>
            </div>
        </div>

        <div class="shade-orange"></div>

        <div class="row border-top-blue" id="mucdichtaotrang">
            <div class="container background-tranparent padding-top-30 padding-bottom-40">
                <div class="row background-tranparent">
                    <div class="col-12 padding-bottom-40">
                        <h1 class="font-lobster text-light text-shadown-black text-center" style="color: #ffb60a !important;">Tại sao mình lại lập ra trang web này ?</h1>
                    </div>
                    <div class="col-md-4" data-aos="fade-up-down">
                        <div class="card scale-onetwo box-shadow-orange text-light background-tranparent padding-top-10">
                            <img class="image-full-width" src="{{ asset('upload/images/one_finger.png') }}" alt="Card image cap">
                            <div class="shade-orange"></div>
                            <div class="card-body background-litle-tranparent">
                                <h4 class="card-title text-center text-shadown-black padding-top-30" style="color: #ffb60a !important;">Thứ nhất</h4>
                                <p class="card-text font-roboto-light ">
                                    Mình thích thì mình làm thôi. Sao phải xoắn chứ. Sống có mấy đâu nên phải sống hết mình
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up-down">
                        <div class="card scale-onetwo box-shadow-orange text-light background-tranparent padding-top-10">
                            <img class="image-full-width" src="{{ asset('upload/images/two_finger.png') }}" alt="Card image cap">
                            <div class="shade-orange"></div>
                            <div class="card-body background-litle-tranparent">
                                <h4 class="card-title text-center text-shadown-black padding-top-30" style="color: #ffb60a !important;">Thứ hai</h4>
                                <p class="card-text font-roboto-light">
                                    Mình thích tìm tòi các công nghê , ngôn ngữ lập trình khác nhau, để mở mang tầm hiểu biết và nâng cao kỹ năng
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up-down">
                        <div class="card scale-onetwo box-shadow-orange text-light background-tranparent padding-top-10">
                            <img class="image-full-width" src="{{ asset('upload/images/three_finger.png') }}" alt="Card image cap">
                            <div class="shade-orange"></div>
                            <div class="card-body background-litle-tranparent">
                                <h4 class="card-title text-center text-shadown-black padding-top-30"style="color: #ffb60a !important;">Cuối cùng</h4>
                                <p class="card-text font-roboto-light">
                                    Còn gì nữa, là để chia sẻ kiến thức cũng như kết thêm nhiều bạn chứ sao. Để có gì lúc đi ăn chơi quên mang tiền còn có thằng cho mượn
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100,
            duration: 1000,
            easing: 'ease-in-sine',
            delay: 100,
        });
    </script>
@endsection