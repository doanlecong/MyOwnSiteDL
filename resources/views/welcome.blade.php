@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('upload/images/image1.jpg')}}" alt="Los Angeles" class="rounded img-carousel">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('upload/images/image2.jpg')}}" alt="Chicago" class="rounded img-carousel">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('upload/images/image3.jpg')}}" alt="New York" class="rounded img-carousel">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        <hr>
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Quote
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Quote
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Quote
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/350x150" alt="Image">
                    </div>
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/350x150" alt="Image">
                    </div>
                    <div class="col-sm">
                        <img src="http://via.placeholder.com/350x150" alt="Image">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <h3>MY OWN SITE</h3>
                        <p>Mình có đam mê với lập trình . Và cũng rất thích âm nhạc . Thể thao cũng nằm trong những sở thích của mình</p>
                        <p>Liên hệ : +84 98 250 36 43</p>
                        <p>Email : thitgaluoc94@gmail.com</p>
                        <p>Facebook : https://www.facebook.com/doan.lecong.33</p>
                    </div>
                    <div class="col-4">
                        <div class="row"><h3>PHP</h3></div>
                        <div class="row"><h3>RUBY</h3></div>
                        <div class="row"><h3>JAVA</h3></div>
                        <div class="row"><h3>.NET</h3></div>
                        <div class="row"><h3>NODEJS</h3></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection