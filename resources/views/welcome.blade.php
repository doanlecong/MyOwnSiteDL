@extends('layouts.app')

@section('content')
    <div id="container-fluid" class="container-fluid justify-content-center border-top-purple">
        <div class="welcome_slogan text-center text-light">
            <h1 class="text-capitalize">Chào mừng bạn đến với <span class="inner_h1" style="font-family: Lobster">My Own Site</span></h1>
            <p class="text-xl-center" style="font-family: Lobster">Với mục đích chính là chia sẻ kiến thức về khoa học máy tính và các công nghệ <span class="inner_p">lập trình Web, lập trình Ứng dụng di động..</span></p>
        </div>
        <canvas id="canvas"></canvas>
    </div>
    <div class="container border-top-blue" style="font-family: Roboto">
        <div class="jumbotron">
            <h1 class="display-6 title_baiviet">5 điều bạn nên làm để có năng lượng tràn trề trong một ngày làm việc.</h1>
            <p class="lead">Ngày ngày , chúng ta đi làm , có thể sẽ có lúc chúng ta cảm thấy mệt mỏi vì mọi thứ cứ tiếp diễn và lặp lại ...</p>
            <hr class="my-4">
            <p>Liệu rằng bạn có thực sự muốn thay đổi chưa. Cuối bài , mình chúc bạn sẽ luôn có những phút giây làm việc hiệu quả và vui vẻ</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Đọc Thêm</a>
            </p>
        </div>
        <div class="devider-line"></div>
        <div class="jumbotron">
            <h1 class="display-6 title_baiviet">Những bài viết cùng cùng chuyên đề mới.</h1>
            <hr class="my-4">
            <p>Cũng theo dõi các bài viết cùng chuyên đề nào các bợn</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            PHP
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Chạy cron job để thực thi các tác vụ không đồng bộ.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            RUBY
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Các kiểu dữ liệu trong ruby ( và còn cả Rails)</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            REACT
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Các trạng thái cơ bản trong một ứng dụng REACT.JS và làm thế nào để sử dụng.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="devider-line"></div>
        <div class="jumbotron">
            <h1 class="display-6 title_baiviet">Các bài viết được nhiều bạn đọc</h1>
            <hr class="my-4">
            <p>Chuỗi bài viết về Framework PHP Laravel</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            PHP
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Mail và cách thức gửi mail trong Laravel</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            PHP
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Gửi Notification trong một ứng dụng Laravel</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card_header_gradient">
                            PHP
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Tối ưu hóa các trình chạy realtime với PusherJS và Laravel Echo</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Đọc nào</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection