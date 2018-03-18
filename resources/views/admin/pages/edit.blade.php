@extends('layouts.app')

@section('title')
    <title>Страница редактирования страницы</title>
@endsection

@section('content')
    <div class="col-md-12 well">
        <p>Редактировать страницу:</p>
        {!! Form::open(['route' => ['pages.update', $page->slug], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название', ['class' => 'label_form'])}}
            {{Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Название страницы'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Краткое описание', ['class' => 'label_form'])}}
            {{Form::text('description', $page->description, ['class' => 'form-control', 'placeholder' => 'Описание: не более 100 символов...'])}}
        </div>
        <div class="form-group">
            {{Form::label('text', 'Содержимое старницы', ['class' => 'label_form'])}}
            {{Form::textarea('text', $page->text, ['class' => 'form-control', 'placeholder' => 'Содержимое старницы: текст, фото...'])}}
        </div>

        <div class="form-group">
            {{Form::submit('Редактировать страницу', ['class' => 'btn btn-success'])}}
        </div>
        @csrf
        {!! Form::close() !!}
    </div>
    <hr>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection