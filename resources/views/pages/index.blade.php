@extends('layouts.app')

@section('title', 'Вкунсятинка - сборник кулинарных рецептов')

@section('description')
    Домашние рецепты вкусных блюд. Множество рецептов с пошаговыми фотографиями.
@endsection

@section('content')
    <div class="col-md-12">
        <div class="well">
            <h1 class="h1_message">Домашние рецепты вкусных блюд</h1>
            @foreach($posts as $post)
                <div class="post_on_cat_page">
                    <div class="post_on_cat_page_title"><a href="{{ route('post.page', $post->slug) }}">{{$post->title}}</a></div>
                    <div class="row post_on_cat_page_content">
                        <div class="col-md-5 col-sm-4"><img src="{{asset('storage/posts/'.$post->img)}}" alt="{{$post->title}}" class="img-thumbnail"></div>
                        <div class="col-md-7 col-sm-8 post_on_cat_page_text" >{!!  mb_substr($post->text, 0, 250) !!} {{ strlen($post->text) > 250 ? '...' : '' }}
                            <a href="{{ route('post.page', $post->slug) }}" class="btn btn-form btn-xs">читать далее</a>
                        </div>
                    </div>
                    <div class="dashed_line_cat_index_page"></div>
                    <div class="post_on_cat_page_info">Категория:
                        @if($post->category_id == null)
                            Без категории
                        @else
                            <a href="{{route('category.page', $post->category->slug)}}">{{ $post->category->title }}</a>
                        @endif
                        | Дата публикации: {{date('d.m.y', strtotime($post->created_at))}} | Автор: {{$post->user->name}} | Комментариев: {{$post->comments()->count()}}</div>
                </div>
            @endforeach
                {{$posts->links()}}
        </div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection