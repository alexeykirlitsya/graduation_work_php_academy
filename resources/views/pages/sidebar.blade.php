    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
            </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Категории</h5>
        <div class="card-body menu_sidebar_pages">
            <ul>
                @foreach($cat_menu as $item)
                    <li>
                        @if($item->url == null)
                            {{ $item->title }}
                        @else
                            <a href="{{url($item->url)}}">{{ $item->title }}</a>
                        @endif
                            @if($item->children->count() > 0)
                                <ul>
                                    @foreach($item->children as $sub)
                                        <li>
                                            @if($sub->url == null)
                                                {{ $sub->title }}
                                            @else
                                                <span class="fa fa-check-circle" style="color:green; font-size:18px;"></span><a href="{{ $sub->url }}" target="_blank">{{ $sub->title }}</a>
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

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>