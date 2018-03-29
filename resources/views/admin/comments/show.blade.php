@extends('layouts.app')

@section('title', 'Страница администратора: комментарии')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="post_single_page_admin_buttons text-right">
                <div style="display: block; float: left;"><a href="{{route('comments.edit', $comment->id)}}" class="btn btn-warning btn-xs">Редактировать</a></div>
                {{Form::open(['action' => ['Admin\CommentsController@destroy', $comment->id], 'method' => 'DELETE'])}}
                {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                @csrf
                {{Form::close()}}
            </div>
            <div class="form-group admin_comment_show_block">
                <div class="admin_comment_title">Название рецепта:</div>
                {{ $comment->post->title }}
            </div>
            <div class="form-group admin_comment_show_block">
                <div class="admin_comment_title">Автор:</div>
                {{ $comment->title }}
            </div>
            <div class="form-group admin_comment_show_block">
                <div class="admin_comment_title">Email:</div>
                {{ $comment->email }}
            </div>
            <div class="form-group admin_comment_show_block">
                <div class="admin_comment_title">Дата:</div>
                {{ $comment->created_at }}
            </div>
            <div class="admin_comment_show_block">
                <div class="admin_comment_title">Комментарий:</div>
                {!! $comment->comment !!}
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection