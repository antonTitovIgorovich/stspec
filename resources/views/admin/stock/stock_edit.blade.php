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
                    <li><a href="{{ route('stock.index') }}">Акции</a></li>
                    <li class="active">{{ $content->title }}</li>
                </ol>
                @include('admin.layouts.response_info_status')
            </div>
            <div class="col-md-12">
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
                <form action="{{ route('stock.update', ['id'=>$content->id]) }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Заголовок:</label>
                        <input type="text" name="title" value="{{ $content->title }}" class="form-control" id="title"
                               placeholder="Заголовок" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor">{!! $content->text !!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection