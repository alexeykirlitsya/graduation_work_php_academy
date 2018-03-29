@extends('layouts.app')

@section('title', 'Страница поиска')

@section('description', 'Страница поиска рецептов')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center">Результаты поиска</h1>
            @if($posts->count() > 0)
                <table class="table text-left">
                    <thead>
                        <th style="width: 180px">Рецепт</th>
                        <th style="width: 120px">Фото</th>
                        <th>Описание</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><a href="{{route('post.page', $post->slug)}}" class="search_title_posts">{{$post->title}}</a></td>
                            <td><img src="{{asset('storage/posts/'.$post->img_small)}}" alt="{{ $post->title }}" class="img-thumbnail"></td>
                            <td>{!! mb_substr($post->text, 0, 120) !!} {!! strlen($post->text) > 120 ? '...' : '' !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            @else
                <div style="text-align: center">Релевантных результатов, к сожалению нет...</div>
            @endif
        </div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection