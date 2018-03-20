<!-- Side Widget -->
<div class="card my-4">
    <div class="card-body">
        <div class="panel-group">
            <div class="panel-body">
                <div class="vertical-menu">
                    <a href="{{route('admin.page')}}" class="{{Route::is('admin.page') ? 'active' : ''}}">Главная</a>
                    <a href="{{route('main-menu.index')}}" class="{{Route::is('main-menu.index') ? 'active' : ''}}">Главное меню</a>
                    <a href="{{route('pages.index')}}" class="{{Route::is('pages.index') ? 'active' : ''}}">Страницы</a>
                    <a href="{{route('categories-menu.index')}}" class="{{Route::is('categories-menu.index') ? 'active' : ''}}">Меню категорий</a>
                    <a href="{{route('categories.index')}}" class="{{Route::is('categories.index') ? 'active' : ''}}">Категории</a>
                    <a href="#">Публикации</a>
                    <a href="#">Комментарии</a>
                    <a href="#">Пользователи</a>
                    <a href="#">Теги</a>
                </div>
            </div>
        </div>
    </div>
</div>
