@extends('layouts.app')

@section('title', 'Страница администратора: пользовтаели')

@section('content')
    <h2 style="text-align: center">Пользователи сайта</h2>
    @if(count($users) > 0)
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 1 ? 'Администратор' : 'Пользователь' }}</td>
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