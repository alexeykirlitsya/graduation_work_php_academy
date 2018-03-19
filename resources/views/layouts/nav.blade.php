<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @foreach($menu as $m)
                    <li class="{{ Request::url() === $m->url ? 'active' : '' }}"><a class="nav-link" href="{{url($m->url)}}">{{ $m->title }}</a></li>
                @endforeach
                    <li class="{{ Route::is('contact.page') ? 'active' : '' }}"><a class="nav-link" href="{{route('contact.page')}}">Контакты</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link {{Route::is('login') ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Вход') }}</a></li>
                    <li><a class="nav-link {{Route::is('register') ? 'active' : ''}}" href="{{ route('register') }}" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-group">
                                @if(Auth::user()->role == 1)
                                    <li class="list-group-item"><a href="{{route('admin.page')}}"><span class="glyphicon glyphicon-user" style="margin-right: 5px"></span>Админка</a></li>
                                @endif
                                <li class="list-group-item"><a href="{{route('home')}}"><span class="glyphicon glyphicon-user" style="margin-right: 5px"></span>Страница профиля</a></li>
                                <li class="list-group-item"><a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-ban-circle" style="margin-right: 5px"></span>Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>