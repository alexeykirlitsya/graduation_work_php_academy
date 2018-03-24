@extends('layouts.app')

@section('title')
    <title>Страница редактирования категории</title>
@endsection

@section('content')
    <div class="col-md-12 well">
        <p>Редактировать категорию:</p>
        {!! Form::open(['route' => ['categories.update', $category->slug], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название', ['class' => 'label_form'])}}
            {{Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Название: не более 190 символов...'])}}
        </div>
        <div class="form-group">
            {{Form::label('slug', 'Название категории транслитом', ['class' => 'label_form'])}}
            {{Form::text('slug', $category->slug, ['class' => 'form-control', 'placeholder' => 'пример: nazvanie-kategorii'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Описание категории', ['class' => 'label_form'])}}
            {{Form::textarea('description', $category->description, ['class' => 'form-control', 'placeholder' => 'Описание: не более 2000 символов...'])}}
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

@section('scripts')
@endsection