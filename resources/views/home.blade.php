@extends('layouts.app')

@section('title')
Страница пользователя: {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Имя: {{ $user->name }}</h4>
                    <h4>E-mail: {{ $user->email }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection