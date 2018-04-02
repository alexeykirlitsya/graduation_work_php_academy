@extends('layouts.app')

@section('title', 'Страница администратора: страницы')

@section('content')
    <a href="{{route('pages.create')}}" class="btn link_add">Добавить новую страницу</a>
        @if(count($pages) > 0)
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Название</th>
                        <th>Описание</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Контакты</td>
                            <td>#</td>
                            <td colspan="2">
                                <span class="not_edit">Редактирование запрещено</span>
                            </td>
                        </tr>
                    @foreach($pages as $page)
                        <tr>
                            <td><a href="{{ route('pages.show', $page->slug) }}" target="_blank">{{ $page->title }}</a></td>
                            <td>{!! mb_substr($page->description, 0, 35) !!} {{ strlen($page->description) > 35 ? '...' : '' }}</td>
                            <td>
                                <a href="{{route('pages.edit', $page->slug)}}" class="btn btn-warning btn-xs">Редактировать</a>
                            </td>
                            <td>
                                {{Form::open(['action' => ['Admin\PagesController@destroy', $page->slug], 'method' => 'DELETE'])}}
                                {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                                {{--@csrf--}}
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>{{$pages->links()}}</div>
            </div>
        @else
            <p>Страниц нет...</p>
        @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection

