@extends('layouts.app')

@section('title')
    <title>{{$post->title}}</title>
@endsection

@section('description')
    {{$post->description}}
@endsection

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
