@extends('layouts.app')

@section('title', 'Страница администратора: комментарии')

@section('content')
    @if(count($comments) > 0)
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Пост</th>
                    <th>Автор</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->title }}</td>
                        <td>
                            <a href="{{route('comments.show', $comment->id)}}" class="btn btn-success btn-xs">Просмотреть</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{$comments->links()}}</div>
        </div>
    @else
        <p>Комментариев нет...</p>
    @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection