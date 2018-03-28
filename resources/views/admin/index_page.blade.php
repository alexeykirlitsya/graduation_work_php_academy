@extends('layouts.app')

@section('title', 'Страница администратора')

@section('content')
    <h2>Основная информация</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h6 class="card-header">Пользователи</h6>
                <div class="card-body">
                    Список пользователей
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h6 class="card-header">Комментарии</h6>
                <div class="card-body">
                    Список комментариев
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection