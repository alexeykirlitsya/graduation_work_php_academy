@extends('layouts.app')

@section('title')
    <title>Страница администратора: посты</title>
@endsection

@section('content')
    <a href="{{route('posts.create')}}" class="btn link_add">Добавить новый пост</a>
    <div class="col-md-12">
        @if(count($posts) > 0)
            <table class="table">
                <thead>
                <th>Название</th>
                <th>Фото</th>
                <th>Категория</th>
                <th>Автор</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="tr">
                        <td><a href="{{route('post.page', $post->slug)}}" target="_blank">{{ $post->title }}</a></td>
                        <td><img src="{{asset('storage/posts/'.$post->img_small)}}" alt="{{ $post->title }}" class="img-thumbnail"></td>
                        <td>
                            @if($post->category_id == null)
                                Без категории
                            @else
                                <a href="{{route('category.page', $post->category->slug)}}" target="_blank">{{ $post->category->title }}</a>
                            @endif
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{route('posts.edit', $post->slug)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['Admin\PostsController@destroy', $post->slug], 'method' => 'DELETE'])}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                            @csrf
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{$posts->links()}}</div>
        @else
            <p>Постов нет...</p>
        @endif
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection