@extends('admin.layouts.main')
@section('content')
    <div class="container list-container">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.response_info_status')
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Заголовок:</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                               placeholder="Заголовок"
                               >
                    </div>
                    <div class="form-group">
                        <label for="desc">Краткое описание:</label>
                        <input type="text" name="desc" value="{{ old('desc') }}" class="form-control" id="desc"
                               placeholder="Максимум 40 символов" maxlength="40"
                               >
                    </div>
                    <div class="form-group">
                        <label for="upload">Выбрать изображение:</label>
                        <input id="upload" type="file" name="img" accept="image/*" class="file">
                    </div>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor" >{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="main_page"
                                        {{ old('main_page') === 'on' ? 'checked' : '' }}
                                > Отобразить на главной
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection