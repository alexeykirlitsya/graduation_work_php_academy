@extends('layouts.app')

@section('title', $page->title)

@section('description')
    {{$page->description}}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="index_single_page">
            @if(!Auth::guest())
                @if(Auth::user()->role->title == 'admin')
                    <div class="post_single_page_admin_buttons text-right">
                        <div style="display: block; float: left;"><a href="{{route('pages.edit', $page->slug)}}" class="btn btn-warning btn-xs">Редактировать</a></div>
                        {{Form::open(['action' => ['Admin\PagesController@destroy', $page->slug], 'method' => 'DELETE'])}}
                        {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                        {{--@csrf--}}
                        {{Form::close()}}
                    </div>
                @endif
            @endif
            <h1>{{$page->title}}</h1>
            <div>{!! $page->text !!}</div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection

