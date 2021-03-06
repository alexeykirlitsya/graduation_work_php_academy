<!-- Side Widget -->
<div class="card my-4">
    <div class="card-body">
        <div class="panel-group">
            <div class="panel-body">
                <div class="vertical-menu">
                    <a href="{{route('admin.home')}}" class="{{Route::is('admin.home') ? 'active' : ''}}">Главная</a>
                    <a href="{{route('main-menu.index')}}" class="{{Route::is('main-menu.index') ? 'active' : ''}}">Главное меню</a>
                    <a href="{{route('pages.index')}}" class="{{Route::is('pages.index') ? 'active' : ''}}">Страницы</a>
                    <a href="{{route('categories-menu.index')}}" class="{{Route::is('categories-menu.index') ? 'active' : ''}}">Меню категорий</a>
                    <a href="{{route('categories.index')}}" class="{{Route::is('categories.index') ? 'active' : ''}}">Категории</a>
                    <a href="{{route('posts.index')}}" class="{{Route::is('posts.index') ? 'active' : ''}}">Публикации</a>
                    <a href="{{route('comments.index')}}" class="{{Route::is('comments.index') ? 'active' : ''}}">Комментарии</a>
                    <a href="{{route('users.index')}}" class="{{Route::is('users.index') ? 'active' : ''}}">Пользователи</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Поиск рецепта</h5>
    <div class="card-body">
        <form action="{{route('search')}}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Название рецепта">
        </form>
    </div>
</div>