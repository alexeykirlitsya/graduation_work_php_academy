@extends('layouts.app')

@section('title', 'Страница администратора: категории')

@section('content')
    <a href="{{route('categories.create')}}" class="btn link_add">Добавить новую категорию</a>
    @if(count($categories) > 0)
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Название</th>
                <th>Постов</th>
                <th>Описание</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="{{ route('category.page', $category->slug) }}" target="_blank">{{ $category->title }}</a></td>
                        <td>{{count($category->posts)}}</td>
                        <td>{!!  mb_substr($category->description, 0, 35) !!} {{ strlen($category->description) > 35 ? '...' : '' }}</td>
                        <td>
                            <a href="{{route('categories.edit', $category->slug)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['Admin\CategoriesController@destroy', $category->slug], 'method' => 'DELETE'])}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                            {{--@csrf--}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{$categories->links()}}</div>
        </div>
    @else
        <p>Категорий нет...</p>
    @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection