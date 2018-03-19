@extends('layouts.app')

@section('title')
    <title>Страница редактирования пункта главного меню</title>
@endsection

@section('content')
    <div class="col-md-12 well">
        <p>Редактировать пункт меню:</p>
        {!! Form::open(['route' => ['categories-menu.update', $menu_parent->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название категории', ['class' => 'label_form'])}}
            {{Form::text('title', $menu_parent->title, ['class' => 'form-control', 'placeholder' => 'Название категории'])}}
        </div>
        <div class="form-group">
            {{Form::label('weight', 'Порядковый номер', ['class' => 'label_form'])}}
            {{Form::number('weight', $menu_parent->weight, ['class' => 'form-control', 'placeholder' => 'Указавыть число от 0 до 100'])}}
        </div>
        <div class="form-group">
            {{Form::label('parent_id', 'Родительская категория', ['class' => 'label_form'])}}
            <select name="parent_id" class="form-control">
                <option value="0">Без родительской</option>
                @foreach($menu_parent as $parent)
                    <option value="{{$parent->id}}">{{$parent->title}}</option>
                @endforeach
            </select>
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