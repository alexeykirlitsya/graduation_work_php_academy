@extends('layouts.app')

@section('title', 'Страница добавления нового поста')

@section('content')
    <div class="col-md-12 well">
        <h1>Форма добавления нового рецепта</h1>
        {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {{Form::label('title', 'Название блюда', ['class' => 'label_form'])}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'пример: Красный борщ'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Краткое описание', ['class' => 'label_form'])}}
            {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Описание: не более 100 символов...'])}}
        </div>
        <div class="form-group">
            {{Form::label('category_id', 'Категория', ['class' => 'label_form'])}}
            {{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('text', 'Описание рецепта', ['class' => 'label_form'])}}
            {{Form::textarea('text', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Описание рецепта'])}}
        </div>
        <div class="form-group">
            {{Form::file('img')}}
        </div>
        <div class="form-group">
            {{Form::submit('Опубликовать рецепт', ['class' => 'btn btn-success'])}}
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
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection