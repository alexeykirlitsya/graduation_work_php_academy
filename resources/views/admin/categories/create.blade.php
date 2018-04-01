@extends('layouts.app')

@section('title', 'Страница добавления новой категории')

@section('content')
    <div class="col-md-12 well">
        <p>Добавить новую категорию:</p>
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Название', ['class' => 'label_form'])}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Название: не более 190 символов...'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Описание категории', ['class' => 'label_form'])}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Описание: не более 2000 символов...'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Добавить категорию', ['class' => 'btn btn-success'])}}
        </div>
        @csrf
        {!! Form::close() !!}
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('scripts')
@endsection