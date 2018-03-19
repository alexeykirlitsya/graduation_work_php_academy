@extends('layouts.app')

@section('title')
    <title>{{$page->title}}</title>
@endsection

@section('description')
    {{$page->description}}
@endsection

@section('content')
    <div class="col-md-12">
        @if(Auth::user()->role == 1)
            <div class="admin_page_buttons_edit">
                <a href="{{route('pages.edit', $page->slug)}}" class="btn btn-warning btn-xs">Редактировать</a>
            </div>
        @endif
        <h1>{{$page->title}}</h1>
        <div>{!! $page->text !!}</div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection

