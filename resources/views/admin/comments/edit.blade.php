@extends('layouts.app')

@section('title', 'Страница редактирования комментария')

@section('content')
    <div class="row">
        <div id="comment-form" class="col-md-12">
            {!! Form::open(['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('title', 'Имя')}}
                        {{Form::text('title', $comment->title, ['class' => 'form-control', 'placeholder' => 'пример: User'])}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', $comment->email, ['class' => 'form-control', 'placeholder' => 'пример: email@gmail.com'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('comment', 'Текст комментария')}}
                        {{Form::textarea('comment', $comment->comment, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'rows' => 5, 'placeholder' => 'Ваш комментарий'])}}<br>
                    </div>
                    <div class="form-group">
                        {{Form::submit('Сохранить изменения', ['class' => 'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
            {{--@csrf--}}
            {{Form::close()}}
        </div>
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection