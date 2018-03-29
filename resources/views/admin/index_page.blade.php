@extends('layouts.app')

@section('title', 'Страница администратора')

@section('content')
    <h2 style="text-align: center">Основная информация</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Страниц: <span class="badge">{{$pages}}</span></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Категорий: <span class="badge">{{$categories}}</span></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Публикаций: <span class="badge">{{$posts}}</span></div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Комментариев: <span class="badge">{{$comments}}</span></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Пользователей: <span class="badge">{{$users}}</span></div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection