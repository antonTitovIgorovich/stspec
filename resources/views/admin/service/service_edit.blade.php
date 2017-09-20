@extends('admin.layouts.main')
@section('content')
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>Редактированние <br> "{{ $content->title }}"</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <div class="container mt50">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('service.index') }}">Сервис</a></li>
                    <li class="active">{{ $content->title }}</li>
                </ol>
                @include('admin.layouts.response_info_status')
            </div>
            <div class="col-md-4 co-sm-4">
                <img class="img-responsive thumbnail"
                     src="{{ asset('storage/services') . "/" . $content->img  }}"
                     alt="{{ $content->title }}">
            </div>
            <div class="col-md-8 xol-sm-8">
                <div class="list-group">
                    <div class="list-group-item">
                        <h4 class="list-group-item-heading">Инд. номер: {{ $content->id }}</h4>
                    </div>
                    <div class="list-group-item">
                        <h4 class="list-group-item-heading">Запись созданна:</h4>
                        <p class="list-group-item-text">{{ $content->created_at }}</p>
                    </div>
                    @if($content->created_at <> $content->updated_at)
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">Последние редактирование:</h4>
                            <p class="list-group-item-text">{{ $content->updated_at }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('service.update', ['id'=>$content->id]) }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Заголовок:</label>
                        <input type="text" name="title" value="{{ $content->title }}" class="form-control" id="title"
                               placeholder="Заголовок" maxlength="255">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="desc">Краткое описание:</label>
                        @include('admin.layouts.sections.desc_seo_specification')
                        <input type="text" name="desc" value="{{ $content->desc }}" class="form-control" id="desc"
                               placeholder="Краткое описание" maxlength="255"
                        >
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="keywords">Ключевые слова:</label>
                        @include('admin.layouts.sections.keywords_seo_specification')
                        <p>(Слова разделяюся запятыми без пробелов)</p>
                        <input type="text" name="keywords" value="{{ $content->keywords }}"
                               class="form-control" id="keywords"
                               placeholder="слово 1,слово 2,слово 3..." maxlength="255"
                        >
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="upload">Выбрать новое изображение:</label>
                        <input id="upload" type="file" name="img" accept="image/*" class="file">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor">{{ $content->text }}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="main_page"
                                       @if( old('main_page') === 'on' or $content->main_page == 1 )
                                       checked
                                        @endif
                                > Отобразить на главной
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection