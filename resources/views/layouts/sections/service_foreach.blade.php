<div class="row">
    @foreach($services as $key => $article)
        @break( $article->main_page !== 1 )
        <div class="col-sm-4 col-xs-12">
            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                    data-wow-delay="{{ $key * 200 }}ms">
                <div class="img-wrapper">
                    <img src="{{ $article->img }}" class="img-responsive" alt="{{ $article->title }}">
                    <div class="overlay">
                        <div class="buttons">
                            <a href="{{ route('serviceArticle', $article->id) }}">Детали</a>
                        </div>
                    </div>
                </div>
                <figcaption>
                    <h4>
                        <a href="{{ route('serviceArticle', $article->id) }}">
                            {{ $article->title }}
                        </a>
                    </h4>
                    <p>
                        "{{ $article->desc }}"
                    </p>
                </figcaption>
            </figure>
        </div>
    @endforeach
</div>