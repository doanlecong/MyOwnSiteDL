@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Blog</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container border-top-blue no-padding-left-right">
        <div class="jumbotron">
            <div class="card_header_gradient">
                Bài viết mới trong tuần này !
            </div>
            <img src="{{ asset('upload/images/my_blog_1.jpg') }}" class="image-full-width" style="max-height: 500px;">
            <h1 class="display-4 title_baiviet">Chào buổi sáng đầu tuần.</h1>
            <p class="lead">Chào buổi sáng , thênh thang bước chân trên đường... Những lời ca trong bài hát Chào buổi sáng được thể hiện bởi ca sĩ Hoàng Hải đường như tiếp thêm năng lượng cho một ngày mới với nhiều năng lương vui tươi ..</p>
            <hr class="my-4">
            <p>Một tuần mới lại bắt đầu , một công việc mới , một khởi đầu mới :></p>
            <a class="btn btn-primary btn-lg " href="#" role="button">Đọc nào</a>
        </div>
        <h2 class="card_header_gradient lead" >Những bài viết còn đó đó , mời bạn đọc xem thêm.</h2>
        <div class="background-blue border-top-blue padding-around">
            <h3 class="text-center font-lobster text-light">Bắt đầu một tuần mới hiệu quả</h3>
            <div class="row font-roboto">
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_2.jpg')}}" alt="Card image cap">
                        <div class="card-body ">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_2.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_2.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="..." class="text-center">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="background-blue border-top-blue padding-around">
            <h3 class="text-center font-lobster text-light">Giữa tuần là những niềm vui</h3>
            <div class="row font-roboto">
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_3.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_3.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_3.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="..." class="text-center">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="background-orange border-top-orange padding-around">
            <h3 class="text-center font-lobster text-light">Cuối tuần thì tràn đầy sảng khoái</h3>
            <div class="row font-roboto">
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_4.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_4.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_4.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="background-purple border-top-purple padding-around">
            <h3 class="text-center font-lobster text-light" >Vi vu muôn nơi ngày chủ nhật</h3>
            <div class="row font-roboto">
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_5.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_5.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="image-full-width" src="{{asset('upload/images/my_blog_5.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection