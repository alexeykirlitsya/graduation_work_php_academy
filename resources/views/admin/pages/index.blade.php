@extends('layouts.app')

@section('title')
    <title>Страница администратора: страницы</title>
@endsection

@section('content')
    <a href="{{route('pages.create')}}" class="btn link_add">Добавить новую страницу</a>

    @if(count($pages) >0)
        <div class="col-md-12">
            <table class="table text-left">
                <thead>
                <th>Название</th>
                <th>Описание</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td><a href="{{ route('pages.show', $page->slug) }}">{{ $page->title }}</a></td>
                        <td>{!!  mb_substr($page->description, 0, 40) !!} {{ strlen($page->description) > 40 ? '...' : '' }}</td>
                        <td>
                            <a href="{{route('pages.edit', $page->slug)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['AdminPagesController@destroy', $page->slug], 'method' => 'DELETE'])}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                            @csrf
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Страниц нет...</p>
    @endif



@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

