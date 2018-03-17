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