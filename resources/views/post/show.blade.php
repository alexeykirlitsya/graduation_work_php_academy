@extends('layouts.app')

@section('title', $post->title)

@section('description', $post->description)

@section('content')
    <div class="col-md-12">
        <div class="post_single_page">
            @if(!Auth::guest())
                @if(Auth::user()->role == 1)
                    <div class="post_single_page_admin_buttons text-right">
                        <div style="display: block; float: left;"><a href="{{route('posts.edit', $post->slug)}}" class="btn btn-warning btn-xs">Редактировать</a></div>
                        {{Form::open(['action' => ['Admin\PostsController@destroy', $post->slug], 'method' => 'DELETE'])}}
                        {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                        @csrf
                        {{Form::close()}}
                    </div>
                @endif
            @endif
            <h1>{{$post->title}}</h1>
            <div class="col-md-12 col-sm-12"><img src="{{asset('storage/posts/'.$post->img)}}" alt="{{$post->title}}" class="img-thumbnail"></div>
            <div style="text-align: justify">{!! $post->text !!}</div>
        </div>
    </div>
    <div class="dashed_line_cat_index_page"></div>
    {{--all comments--}}
    <div class="row">
        <div class="col-md-11 comment_padding">
            <h3 class="comments-title">Количество комментариев: {{ $post->comments()->count() }} </h3>
            <div class="col-md-8 col-md-offset-2">
            @foreach($post->comments as $comment)
                <div class="comment panel panel-default">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=identicon" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->title }}</h4>
                            <p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>

                    </div>

                    <div class="comment-content" style="text-align: left">
                        {!! $comment->comment !!}
                    </div>

                </div>
            @endforeach
            </div>
        </div>
    </div>

    {{--comment form--}}
    <hr>
    <div class="row">
        <div id="comment-form" class="col-md-11 comment_padding">
            {!!Form::open(['route' => 'post.comment.store', 'method' => 'POST'])!!}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{Form::label('title', 'Имя')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'пример: User'])}}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'пример: email@gmail.com'])}}
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="form-group">
                        {{Form::label('comment', 'Текст комментария')}}
                        {{Form::textarea('comment', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'rows' => 5, 'placeholder' => 'Ваш комментарий'])}}<br>
                    </div>
                    {{ Form::hidden('post_id', $post->id) }}
                    <div class="form-group">
                        {{Form::submit('Опубликовать комментарий', ['class' => 'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
            @csrf
            {{Form::close()}}
        </div>
    </div>

@endsection

@section('sidebar')
    @include('pages.sidebar')
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Новые рецепты</h5>
        <div class="card-body">
            @foreach($last_posts as $new)
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset('storage/posts/'. $new->img_small)}}" alt="" class="img-thumbnail" style="width: 100px">
                    </div>
                    <div class="col-md-7">
                        <a href="{{route('post.page', $new->slug)}}">{{ $new->title}}</a>
                    </div>
                    </div>
                </div>
                <div class="dashed_line_cat_index_page"></div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection