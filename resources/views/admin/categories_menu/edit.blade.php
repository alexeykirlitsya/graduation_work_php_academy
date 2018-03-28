@extends('layouts.app')

@section('title', 'Страница редактирования пункта главного меню')

@section('content')
    <div class="col-md-12 well">
        <p>Редактировать пункт меню:</p>
        {!! Form::open(['route' => ['categories-menu.update', $item->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название категории', ['class' => 'label_form'])}}
            {{Form::text('title', $item->title, ['class' => 'form-control', 'placeholder' => 'Название категории'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'URL', ['class' => 'label_form'])}}
            {{Form::text('url', $item->url, ['class' => 'form-control', 'placeholder' => 'URL страницы'])}}
        </div>
        <div class="form-group">
            {{Form::label('weight', 'Порядковый номер', ['class' => 'label_form'])}}
            {{Form::number('weight', $item->weight, ['class' => 'form-control', 'placeholder' => 'Указавыть число от 0 до 100'])}}
        </div>

        <div class="form-group">
            {{Form::label('parent_id', 'Родительская категория', ['class' => 'label_form'])}}
            {{Form::select('parent_id', $parent_item, $item->parent_id, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Сохранить изменения', ['class' => 'btn btn-success'])}}
        </div>
        @csrf
        {!! Form::close() !!}
    </div>
    <hr>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection