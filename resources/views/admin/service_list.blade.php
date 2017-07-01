@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Сервис</h2></div>
                    <div class="panel-body">
                        <a href="{{ route('service.create') }}">
                            Новая статья
                            <i class="ion-android-add"></i>
                        </a>
                    </div>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Инд.</th>
                            <th>Название</th>
                            <th>Детали</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($content as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if(!empty($item->desc))
                                        <p>{{ $item->desc }}</p>
                                    @endif
                                    <h4>Создано:</h4>
                                    <p>{{ $item->created_at }}</p>
                                    @if( $item->updated_at != $item->created_at)
                                        <h4>Редактировалось:</h4>
                                        <p>{{ $item->updated_at }}</p>
                                    @endif
                                    @if(isset($item->main_page))
                                        <h4>Отображенно <br> на главной: <i class="ion-checkmark"></i></h4>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('service.show', ['id'=> $item->id]) }}" title="Show"
                                       class="btn btn-primary">
                                        <i class="ion-eye"></i>
                                    </a>
                                    <button title="Edit" type="button" class="btn btn-success">
                                        <i class="ion-android-create"></i>
                                    </button>
                                    <button title="Delete" type="button" class="btn btn-danger">
                                        <i class="ion-close"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-centered">
                    {{ $content->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection('content')