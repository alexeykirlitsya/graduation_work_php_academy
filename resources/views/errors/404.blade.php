@extends('layouts.app')

@section('title')
    <title>Страница 404</title>
@endsection

@section('content')
    <div style="display:block;margin: 10px auto 0; text-align: center">
        <img src="{{asset('/img/errors/error404.jpg')}}" alt="404 ошибка">
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection
