@extends('layouts.app')

@section('title')
    <title>Страница администратора: главное меню</title>
@endsection

@section('content')
    <a href="{{route('main-menu.create')}}" class="btn link_add">Добавить пункт меню</a>

    @if(count($menu) >0)
        <div class="col-md-12">
            <table class="table text-left">
                <thead>
                <th>Название</th>
                <th>URL</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($menu as $m)
                    <tr>
                        <td>{{$m->title}}</td>
                        <td>{{$m->url}}</td>
                        <td>
                            <a href="{{route('main-menu.edit', $m->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['AdminMainMenuController@destroy', $m->id], 'method' => 'DELETE'])}}
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
        <p>Категорий нет...</p>
    @endif



@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

