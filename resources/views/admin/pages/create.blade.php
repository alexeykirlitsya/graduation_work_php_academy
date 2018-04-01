@extends('layouts.app')

@section('title', 'Страница добавления новой страницы')

@section('content')
    <div class="col-md-12 well">
        <p>Добавить новую страницу:</p>
        {!! Form::open(['route' => 'pages.store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Название', ['class' => 'label_form'])}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Название страницы'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Краткое описание', ['class' => 'label_form'])}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Описание: не более 100 символов...'])}}
            </div>
            <div class="form-group">
                {{Form::label('text', 'Содержимое старницы', ['class' => 'label_form'])}}
                {{Form::textarea('text', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Содержимое старницы: текст, фото...'])}}
            </div>

            <div class="form-group">
                {{Form::submit('Добавить страницу', ['class' => 'btn btn-success'])}}
            </div>
            @csrf
        {!! Form::close() !!}
    </div>
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