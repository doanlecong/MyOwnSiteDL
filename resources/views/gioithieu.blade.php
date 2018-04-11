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
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-4">
                <img class="rounded embed-responsive my-image" src="http://via.placeholder.com/600x600" alt="My Image">
            </div>
            <div class="col-sm-8">
                <table class="table table-hover table-striped">
                    <tbody>
                    <tr>
                        <td><th>My Name :</th></td>
                        <td>Le Cong Doan</td>
                    </tr>
                    <tr>
                        <td><th>My Hobbies :</th></td>
                        <td>Bong da , cau long, boi loi, doc sach, nghe nhac , xem phim</td>
                    </tr>
                    <tr>
                        <td><th>My Degree :</th></td>
                        <td>I have been graduated in Ho Chi Minh City University of Technology (Bach Khoa TP.HCM)</td>
                    </tr>
                    <tr>
                        <td><th>My Professional :</th></td>
                        <td>My major is Computer Science</td>
                    </tr>
                    <tr>
                        <td><th>Working in :</th></td>
                        <td>Web Developer , Mobile App Developer ( Android is my love) , Software Developer</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-outline-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-outline-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-outline-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection