<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">NEWS BLOG</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('news')}}">Главная</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Список категорий</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('admin.news.index')}}">Войти(Админ)</a></li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Добро пожаловать в Новостной Блог</div>
        <div class="masthead-heading text-uppercase">Рады видесть Вас!</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Перейти к новостям</a>
    </div>
</header>
