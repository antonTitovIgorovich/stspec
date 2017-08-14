<nav class="collapse navbar-collapse navbar-right" role="navigation">
    <div class="main-menu">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('service.index') }}">Сервис</a></li>
            <li><a href="{{ route('blog.index') }}">Блог</a></li>
            <li><a href="{{ route('stock.index') }}">Акции</a></li>
            <li><a href="{{ route('indexPage') }}" class="green-color">На сайт</a></li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" class="red-color">
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
