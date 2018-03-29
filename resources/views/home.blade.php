@extends('layouts.app')

@section('title')
Страница пользователя: {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <h4><span style="font-size: 16px">Имя:</span> {{ $user->name }}</h4>
                <h4><span style="font-size: 16px">E-mail:</span> {{ $user->email }}</h4>
                <h4><span style="font-size: 16px">Роль:</span> {{ $user->role == 1 ? 'Администратор' : 'Пользователь'}} </h4>
                @if(!Auth::guest())
                    @if(Auth::user()->role == 1)
                        <br>
                        <div class="dashed_line_cat_index_page"></div>
                        <br>
                        <h4 style="text-align: center">Ваши рецепты</h4>
                        <br>
                        @if(count($posts) >0)
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
                                        <td>{!! mb_substr($post->text, 0, 100) !!} {!! strlen($post->text) > 100 ? '...' : '' !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$posts->links()}}
                        @else
                            <p>У вас пока нет публикаций</p>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection