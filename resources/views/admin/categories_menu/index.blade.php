@extends('layouts.app')

@section('title')
    <title>Страница администратора: меню категорий</title>
@endsection

@section('content')
    <a href="{{route('categories-menu.create')}}" class="btn link_add">Добавить новый пункт в меню категорий</a>
    @if(count($menu_parent) > 0)
        <div class="col-md-12">
            <h3 style="text-align: center">Родительские категории</h3>
            <table class="table">
                <thead>
                    <th>Название</th>
                    <th>Вес</th>
                    <th>Родитель</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($menu_parent as $parent)
                    <tr>
                        <td>{{ $parent->title }}</td>
                        <td>{{ $parent->weight }}</td>
                        <td>{{ $parent->parent_id == 0 ? 'Нет' : $parent->parent_id }}</td>
                        <td>
                            <a href="{{route('categories-menu.edit', $parent->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['AdminIndexCategoriesMenu@destroy', $parent->id], 'method' => 'DELETE'])}}
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
        <p>Пунктов в меню категорий нет...</p>
    @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

