@extends('layouts.app')
@section('title')
    {{ " | Opps , Khong tim thay roi  hu hu ! " }}
@endsection
@section('content')
    <div id="container-fluid" class="container-fluid justify-content-center border-top-blue border-bottom-bluethin">
        <div class="welcome_slogan d-flex justify-content-center align-items-center text-light background-tranparent"  style="width: 100%">
            <h1 class="text-center font-roboto-light font-weight-bold" style="width: 100%">
                Hình như không có thông tin gì cho đường link này thì phải !
           </h1>
        </div>
        <canvas id="canvas"></canvas>
    </div>
@endsection