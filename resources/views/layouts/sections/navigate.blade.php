<nav class="collapse navbar-collapse navbar-right" role="navigation">
    <div class="main-menu">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('index') }}">Главная</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Сервис
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        @forelse($services as $item)
                            <li><a href="{{ route('serviceArticle', $item->id) }}">{{ $item->title }}</a></li>
                        @empty
                            <li>Пустое меню</li>
                        @endforelse
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('blog') }}">Блог</a></li>
            <li><a href="{{ route('contact') }}">Контакты</a></li>
        </ul>
    </div>
</nav>
