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
                    <li><a href="{{ route('blog.index') }}">Блог</a></li>
                    <li class="active">{{ $content->title }}</li>
                </ol>
                @include('admin.layouts.response_info_status')
            </div>
            <div class="col-md-4 co-sm-4">
                <img class="img-responsive thumbnail"
                     src="{{ asset('storage/blog/img_main') . "/" . $content->img_main  }}"
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
                <form action="{{ route('blog.update', ['id'=>$content->id]) }}" method="post"
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
                        <label for="upload">Выбрать новое главное изображение:</label>
                        <input id="upload" type="file" name="img_main" accept="image/*" class="file">
                    </div>
                    <div class="form-group">
                        <label for="uploads">Выбрать новые изображения<br>для галлереи:</label>
                        <input id="uploads" type="file" name="gallery_imgs[]" accept="image/*" class="file" multiple>
                    </div>
                    @if(count($content->images) > 0)
                        <div class="form-group">
                            <label>Удалить ранее загруженные изображения <br> из галлереи:
                                <input id="input-hidden" type="hidden" name="remove_imgs" value="">
                                <br>
                                <a href="#" class="btn btn-primary mt8" data-toggle="modal" data-target="#myModal">
                                    Выбрать
                                </a>
                            </label>
                        </div>
                    @endif
                    <hr>
                    <div class="form-group">
                        <label for="editor">Текст:</label>
                        <textarea name="text" id="editor">{{ $content->text }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(count($content->images) > 0)
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Удалить изображения из галлереи</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($content->images as $image)
                            <img class="img-thumbnail"
                                 src="{{ asset('storage/blog/gallery') . "/" . $image->file_name  }}"
                                 alt="{{ $image->file_name}}">
                            <div class="checkbox">
                                <label>
                                    <input class="select-to-delete" data-name="{{ $image->file_name   }}"
                                           type="checkbox"> Удалить
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection