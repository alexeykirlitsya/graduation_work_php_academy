@extends('layouts.app')

@section('title', 'Страница добавления нового пользователя')

@section('content')
    <div class="col-md-12 well">
        <p>Добавить нового пользователя:</p>
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('role', 'Роль:', ['class' => 'label_form'])}}
            {{Form::number('role', '', ['class' => 'form-control', 'placeholder' => 'администратор = 1, пользователь = 0'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Имя:', ['class' => 'label_form'])}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Имя пользователя'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email:', ['class' => 'label_form'])}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email пользователя'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Пароль:', ['class' => 'label_form'])}}
            {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Пароль пользователя'])}}
        </div>
        <div class="form-group">
            {{Form::label('password_confirmation', 'Подтвердить пароль:', ['class' => 'label_form'])}}
            {{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Подтвердите пароль'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Добавить пользователя', ['class' => 'btn btn-success'])}}
        </div>
        {{--@csrf--}}
        {!! Form::close() !!}
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('scripts')
@endsection