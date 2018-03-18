@extends('layouts.app')

@section('title')
    <title>Страница добавления нового пункта главного меню</title>
@endsection

@section('content')
    <div class="col-md-12 well">
        <p>Добавить новый пункт меню:</p>
        {!! Form::open(['route' => 'main-menu.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название', ['class' => 'label_form'])}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Название пункта меню'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'URL', ['class' => 'label_form'])}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'url страницы'])}}
        </div>

        <div class="form-group">
            {{Form::submit('Добавить пункт', ['class' => 'btn btn-success'])}}
        </div>
        @csrf
        {!! Form::close() !!}
    </div>
    <hr>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection