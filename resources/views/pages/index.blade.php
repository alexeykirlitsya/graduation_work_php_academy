@extends('layouts.app')

@section('description')
    Домашние рецепты вкусных блюд от Татьяны. Множество рецептов с пошаговыми фотографиями.
@endsection

@section('title')
    <title>Главная страница</title>
@endsection

@section('content')
   @include('pages.content')
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection