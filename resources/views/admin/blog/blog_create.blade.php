@extends('admin.layouts.main')
@section('content')
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>Новая статья<br>для Блога</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <div class="container mt50">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('blog.index') }}">Блог</a></li>
                    <li class="active">Новая статья</li>
                </ol>
                @include('admin.layouts.response_info_status')
            </div>
            <div class="col-md-12">
                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Заголовок:</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                               placeholder="Заголовок" maxlength="255"
                        >
                    </div>
                    <div class="form-group">
                        <label for="desc">Краткое описание:</label>
                        <input type="text" name="desc" value="{{ old('desc') }}" class="form-control" id="desc"
                               placeholder="Краткое описание" maxlength="255"
                        >
                    </div>
                    <div class="form-group">
                        <label for="upload">Выбрать основное изображение:</label>
                        <input id="upload" type="file" name="img_main" accept="image/*" class="file">
                    </div>
                    <div class="form-group">
                        <label for="uploads">Выбрать изображения для галлереи:</label>
                        <input id="uploads" type="file" name="gallery_imgs[]" accept="image/*" class="file" multiple>
                    </div>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor">{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection