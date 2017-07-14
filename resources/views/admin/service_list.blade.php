@extends('admin.layouts.main')
@section('content')
    <div class="container list-container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-center">Сервис</h1>
                <table class="table table-hover">
                    <tr>
                        <th>Инд.</th>
                        <th>Название</th>
                        <th>Краткое описание</th>
                        <th>На главной</th>
                        <th>Действия</th>
                    </tr>
                    @foreach($content as $item)
                        <tr data-id="{{ $item->id }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if(!empty($item->desc))
                                    <p>{{ $item->desc }}</p>
                            @endif
                            <td>
                                @if(isset($item->main_page))
                                    <h4><i class="ion-checkmark"></i></h4>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('service.show', ['id'=> $item->id]) }}" title="Show"
                                   class="btn btn-primary">
                                    <i class="ion-eye"></i>
                                </a>
                                <a href="{{ route('service.edit', ['id'=> $item->id]) }}" title="Edit"
                                   class="btn btn-success">
                                    <i class="ion-android-create"></i>
                                </a>
                                <a href="#" title="Delete" class="btn dialog-btn btn-danger"
                                   data-title="{{ $item->title }}"
                                   data-id="{{ $item->id }}"
                                   data-toggle="modal" data-target="#modal">
                                    <i class="ion-close"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('service.create') }}" class="btn btn-success btn-add-article">
                    Добавить статью
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-centered">
                {{ $content->render() }}
            </div>
        </div>
    </div>
    @include('admin.layouts.sections.modal-delete')
@endsection('content')