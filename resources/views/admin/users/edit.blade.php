@extends('layouts.app')

@section('title', 'Страница редактирования данных пользователя')

@section('content')
    <div class="col-md-12 well">
        <p>Редактирование данных пользователя:</p>
        {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('role_id', 'Роль', ['class' => 'label_form'])}}
            {{Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Имя:', ['class' => 'label_form'])}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Имя пользователя'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email:', ['class' => 'label_form'])}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email пользователя'])}}
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
            {{Form::submit('Сохранить изменения', ['class' => 'btn btn-success'])}}
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