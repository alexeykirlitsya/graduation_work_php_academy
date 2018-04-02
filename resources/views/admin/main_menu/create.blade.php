@extends('layouts.app')

@section('title', 'Страница добавления нового пункта главного меню')

@section('content')
    <div class="col-md-12 well">
        <p>Добавить новый пункт меню:</p>
        {!! Form::open(['route' => 'main-menu.store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Название', ['class' => 'label_form'])}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Название пункта меню'])}}
            </div>
            <div class="form-group">
                {{Form::label('weight', 'Порядковый номер', ['class' => 'label_form'])}}
                {{Form::number('weight', '', ['class' => 'form-control', 'placeholder' => 'Указавыть число от 0 до 100'])}}
            </div>
            <div class="form-group">
                {{Form::label('url', 'URL', ['class' => 'label_form'])}}
                {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'URL страницы'])}}
            </div>
            <div class="form-group">
                {{Form::submit('Добавить пункт', ['class' => 'btn btn-success'])}}
            </div>
            {{--@csrf--}}
        {!! Form::close() !!}
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection