@extends('layouts.app')

@section('description')
    {{$category->title}} - категория кулинарны рецептов блога Вкуснятинка
@endsection

@section('title')
    <title>{{$category->title}}</title>
@endsection

@section('content')
    <div class="col-md-12">
            <div class="well">
                <h1 class="h1_message">{{$category->title}}</h1>
                <div>{{$category->description}}</div>
            </div>
            {{--@foreach($posts as $post)--}}
                {{--<div class="well text-left">--}}
                    {{--<div class="title"><a href="{{ route('blog.single', $post->slug) }}">{{$post->title}}</a></div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4 col-sm-4"><img src="{{asset('storage/img/posts_img')}}/{{$post->img}}" alt="{{$post->title}}" class="post_img img-thumbnail"></div>--}}
                        {{--<div class="col-md-8 col-sm-8">{!!  mb_substr($post->text, 0, 300) !!} {{ strlen($post->text) > 300 ? '...' : '' }}--}}
                            {{--<a href="{{ route('blog.single', $post->slug) }}">читать далее >></a></div>--}}
                    {{--</div>--}}
                    {{--<div class="text-right created_at">Категория: {{$post->category->title}} | Дата публикации: {{date('m.d.y', strtotime($post->created_at))}} | Автор: {{$post->user->name}}</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            {{--{{$posts->links()}}--}}
        </div>
@endsection

@section('sidebar')
    @include('pages.sidebar')
@endsection


