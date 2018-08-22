@extends('layouts.app')

@section('title', 'Страница администратора: пользовтаели')

@section('content')
    <a href="{{route('users.create')}}" class="btn link_add">Добавить нового пользователя</a>
    <h2 style="text-align: center">Пользователи сайта</h2>
    @if(count($users) > 0)
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->title == "admin" ? 'Администратор' : 'Пользователь' }}</td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                        </td>
                        <td>
                            {{Form::open(['action' => ['Admin\UsersController@destroy', $user->id], 'method' => 'DELETE'])}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                            {{--@csrf--}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{$users->links()}}</div>
        </div>
    @else
        <p>Пользователей нет...</p>
    @endif
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection