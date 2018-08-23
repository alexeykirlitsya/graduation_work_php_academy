@extends('layouts.app')

@section('title', 'Страница редактирования пункта главного меню')

@section('content')
    <div class="col-md-12 well">
        <p>Редактировать пункт меню:</p>
        {!! Form::open(['route' => ['main-menu.update', $menu->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название', ['class' => 'label_form'])}}
            {{Form::text('title', $menu->title, ['class' => 'form-control', 'placeholder' => 'Название пункта меню'])}}
        </div>
        <div class="form-group">
            {{Form::label('weight', 'Порядковый номер', ['class' => 'label_form'])}}
            {{Form::number('weight', $menu->weight, ['class' => 'form-control', 'placeholder' => 'Указавыть число от 0 до 100'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'URL', ['class' => 'label_form'])}}
            {{Form::text('url', $menu->url, ['class' => 'form-control', 'placeholder' => 'url страницы'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Сохранить изменения', ['class' => 'btn btn-success'])}}
        </div>
        {{--@csrf--}}
        {!! Form::close() !!}
    </div>
    <hr>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection