@extends('admin.layouts.main')
@section('content')
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>Акции</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <div class="container mt50">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>Инд.</th>
                        <th>Название</th>
                        <th>Текст</th>
                        <th>Действия</th>
                    </tr>
                    @foreach($content as $item)
                        <tr data-id="{{ $item->id }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! str_limit($item->text, 40) !!}</td>
                            <td>
                                <div class="event-btn-wrap">
                                    <a href="{{ route('stock.edit', ['id'=> $item->id]) }}" title="Edit"
                                       class="btn btn-success">
                                        <i class="ion-android-create"></i>
                                    </a>
                                    <a href="#" title="Delete" class="btn stock-dialog-btn btn-danger"
                                       data-title="{{ $item->title }}"
                                       data-id="{{ $item->id }}"
                                       data-toggle="modal" data-target="#modal">
                                        <i class="ion-close"></i>
                                    </a>
                                </div>                                
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('stock.create') }}" class="btn btn-success btn-add-article">
                    Добавить акцию
                </a>
            </div>
        </div>
    </div>
    @include('admin.layouts.sections.modal-delete')
@endsection('content')