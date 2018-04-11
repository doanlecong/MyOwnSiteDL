@guest
    <li><a class="nav-link" href="{{ route('login') }}">My Blog</a></li>
    <li><a class="nav-link" href="{{ route('login') }}">Serie Bài Viết</a></li>
    <li><a class="nav-link" href="{{ route('login') }}">Chuyên Đề</a></li>
    <li><a class="nav-link" href="{{ route('login') }}">Dịch Vụ</a></li>
    <li><a class="nav-link" href="{{ route('login') }}">Liên Hệ</a></li>
    {{--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>--}}
    {{--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}

@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest

<div class="container">
    <div class="row text-center">
        <div class="col-sm-4">
            <img class="rounded embed-responsive" src="http://via.placeholder.com/600x600" alt="My Image">
        </div>
        <div class="col-sm-6">
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
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://via.placeholder.com/600x600" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>