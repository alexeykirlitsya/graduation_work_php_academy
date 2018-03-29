<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Поиск рецепта</h5>
    <div class="card-body">
        <form action="{{route('search')}}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Название рецепта">
        </form>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Категории</h5>
    <div class="card-body menu_sidebar_pages">
        <ul class="list-group">
            @foreach($cat_menu as $item)
                <li class="list-group-item">
                    @if($item->url == null)
                        <a href="#" class="menu_sidebar_pages_item" data-toggle="collapse" data-target="#{{$item->id}}">{{ $item->title }}</a>
                    @else
                        <a href="{{url($item->url)}}">{{ $item->title }}</a>
                    @endif
                    @if($item->children->count() > 0)
                        <ul id="{{$item->id}}" class="collapse">
                            @foreach($item->children as $sub)
                                <li>
                                    @if($sub->url == null)
                                        {{ $sub->title }}
                                    @else
                                        <span class="fa fa-check" style="color:#7A2F1F; font-size:14px;"></span><a href="{{ $sub->url }}">{{ $sub->title }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Last comments HOME PAGE - logout index page-->
@if(Route::is('index.page'))
    <!-- Last comments-->
    <div class="card my-4">
        <h5 class="card-header">Последние комментарии</h5>
        <div class="card-body">
            <div class="input-group">
                @foreach($comments as $comment)
                    <div class="comments_index_page">
                        <div class="comments_index_page_title">{{ $comment->post->title }}</div>
                        <div>{!! $comment->comment !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif