@extends('layouts.app')

@section('title', 'Страница администратора: главное меню')

@section('content')
    <a href="{{route('main-menu.create')}}" class="btn link_add">Добавить пункт меню</a>
        @if(count($menu) > 0)

            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Название</th>
                        <th>Вес</th>
                        <th>URL</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($menu as $m)
                        <tr>
                            <td>{{$m->title}}</td>
                            <td>{{$m->weight}}</td>
                            <td>
                                @if($m->url)
                                    <span class="fa fa-check-circle" style="color:green; font-size:18px;"></span>
                                @else
                                    <span class="fa fa-ban" style="color:red; font-size:18px;"></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('main-menu.edit', $m->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                            </td>
                            <td>
                                {{Form::open(['action' => ['Admin\MainMenuController@destroy', $m->id], 'method' => 'DELETE'])}}
                                {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                                {{--@csrf--}}
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Контакты</td>
                        <td>min</td>
                        <td><span class="fa fa-check-circle" style="color:green; font-size:18px;"></span></td>
                        <td colspan="2">
                            <span class="not_edit">Редактирование запрещено</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @else
            <p>Пунктов нет...</p>
        @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection