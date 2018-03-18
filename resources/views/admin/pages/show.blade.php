@extends('layouts.app')

@section('title')
    <title>Страница администратора: страницы</title>
@endsection

@section('content')
    <div class="col-md-12">
        <h1>{{$page->title}}</h1>
        <div>{{$page->text}}</div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection

