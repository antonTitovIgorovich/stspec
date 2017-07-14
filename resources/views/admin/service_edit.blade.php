@extends('admin.layouts.main')
@section('content')
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>Редактированние "{{ $content->title }}"</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <div class="container edit-page-container">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.response_info_status')
                <form action="{{ route('service.update', ['id'=>$content->id]) }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Заголовок:</label>
                        <input type="text" name="title" value="{{ $content->title }}" class="form-control" id="title"
                               placeholder="Заголовок"
                        >
                    </div>
                    <div class="form-group">
                        <label for="desc">Краткое описание:</label>
                        <input type="text" name="desc" value="{{ $content->desc }}" class="form-control" id="desc"
                               placeholder="Максимум 40 символов" maxlength="40"
                        >
                    </div>
                    <div class="form-group">
                        <img class="img-responsive img-small"
                             src="{{ asset('storage/services') . "/" . $content->img  }}"
                             alt="{{ $content->title }}">
                        <label for="upload">Выбрать новое изображение:</label>
                        <input id="upload" type="file" name="img" accept="image/*" class="file">
                    </div>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor">{{ $content->text }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="main_page"
                                       @if( old('main_page') === 'on' or $content->main_page === 1 )
                                       checked
                                        @endif
                                > Отобразить на главной
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection