@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-top no-padding-left-right">
        <div class="row text-center background-darkblue text-light padding-around" id="thongtinbanthan">
            <div class="col-sm-4">
                <img class="rounded embed-responsive my-image" src="{{ asset('upload/images/myseft.jpg') }}" alt="My Image">
            </div>
            <div class="col-sm-8">
                <table class="table table-hover table-striped">
                    <tbody>
                    <tr>
                        <th class="text-right padding-top-30 no-padding-left-right">My Name</th>
                        <td class="text-left padding-top-30 ">Doan Le</td>
                    </tr>
                    <tr>
                        <th class="text-right padding-top-30 no-padding-left-right"><span>My Hobbies</span></th>
                        <td class="text-left padding-top-30 ">Bong da , cau long, boi loi, doc sach, nghe nhac , xem phim</td>
                    </tr>
                    <tr>
                        <th class="text-right padding-top-30 no-padding-left-right">My Degree</th>
                        <td class="text-left padding-top-30 ">I have been graduated in Ho Chi Minh City University of Technology (Bach Khoa TP.HCM)</td>
                    </tr>
                    <tr>
                        <th class="text-right padding-top-30 no-padding-left-right"><span>My Professional </span></th>
                        <td class="text-left padding-top-30 ">My major is Computer Science</td>
                    </tr>
                    <tr>
                        <th class="text-right padding-top-30 no-padding-left-right">Working in</th>
                        <td class="text-left padding-top-30 ">Web Developer , Mobile App Developer ( Android is my love) , Software Developer</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="shade-orange"></div>
        <div class="row border-top-blue background-blue padding-around" id="mucdichtaotrang">
            <div class="col-12 padding-bottom-40">
                <h1 class="font-lobster text-light text-shadown-black text-center" style="color: #ffb60a !important;">Tại sao mình lại lập ra trang web này ?</h1>
            </div>
            <div class="col-md-4">
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
            <div class="col-md-4">
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
            <div class="col-md-4">
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
@endsection