@extends('layouts.app')

@section('title')
    <title>Контакты</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="starter-template">
                <h1>Форма обратной связи</h1>
                <hr>
                {!! Form::open(['route' => 'post.contact.page', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('email', 'Ваш email', ['class' => 'label_form'])}}
                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'user@gmail.com'])}}
                </div>
                <div class="form-group">
                    {{Form::label('topic', 'Тема письма', ['class' => 'label_form'])}}
                    {{Form::text('topic', '', ['class' => 'form-control', 'placeholder' => 'Замечания, предложения, пожелания, благодарности'])}}
                </div>
                <div class="form-group">
                    {{Form::label('message', 'Текст сообщениния', ['class' => 'label_form'])}}
                    {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Текст сообщения'])}}
                </div>
                <div class="form-group">
                    {{Form::submit('Отправить письмо', ['class' => 'btn btn-form'])}}
                </div>
                @csrf
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection