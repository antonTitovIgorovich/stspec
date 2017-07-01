<nav class="collapse navbar-collapse navbar-right" role="navigation">
    <div class="main-menu">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Контент
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="{{ route('service.index') }}">Сервис</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">Акции</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Пароли</a></li>
            <li><a href="{{ route('indexPage') }}">На сайт</a></li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
