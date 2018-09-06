![](https://avatars2.githubusercontent.com/u/31931131?s=460&v=4)

Фамилия: Кирлица  
Имя: Алексей

  
Email: alexeykirlitsya@gmail.com  
Github: [github.com/alexeykirlitsya](https://github.com/alexeykirlitsya)  
Facebook: [www.facebook.com/alexeykirlitsya](https://www.facebook.com/alexeykirlitsya)

* * *

**Файлы блога на github:** [ссылка на репозиторий](https://github.com/alexeykirlitsya/graduation_work_php_academy)

* * *

**На блоге реализовано:**

1.  Регистрация/Авторизация - встроеная и с помощью **api**: google, github, bitbucket;
2.  Основное меню (пункт «Контакты» по умолчанию);
3.  Двухуровневое меню категорий;
4.  Страницы;
5.  Категории - пагинация постов;
6.  Посты (рецепты);
7.  Комментарии (зарегистрированным пользователям email и имя подставляется из базы);
8.  Аватар пользователя в комментарии;
9.  Поиск – пагинация постов;
10.  Форма обратной связи – страница контакты (отправка посредством **ajax**);
11.  Виджет: вывод последних комментариев – главная страница;
12.  Виджет: вывод новых постов (рецептов) – страница поста;
13.  Страница пользователя – (данные профиля, публикации – если профиль администратора);
14.  Флеш сообщение (через сессию - все страницы, через js - страница контакты);

**Админка:**

1.  Роли – (admin, user - Middleware(CheckRole));
2.  Главная страница – основная информация;
3.  Главное меню – grud (поле url – адрес страницы, категории, поста и т.д.);
4.  Страницы – grud;
5.  Меню категорий – grud (родительские и дочерние категории - одна таблица);
6.  Категории – grud;
7.  Публикации – grud (img – дефолтное, обновление, удаление img при удалении поста);
8.  Комментарии – grud (при удалении поста, комментарии удаляются - onDelete('cascade'));
9.  Пользователи - grud;

**Использовались laravel пакеты и дополнения:**

*   Forms & HTML - [https://laravelcollective.com/](https://laravelcollective.com/);
*   Image - [http://image.intervention.io/](http://image.intervention.io/);
*   Purifier - [https://github.com/mewebstudio/Purifier](https://github.com/mewebstudio/Purifier);
*   Search - [https://www.algolia.com](https://www.algolia.com);
*   Ckeditor - [https://github.com/UniSharp/laravel-ckeditor](https://github.com/UniSharp/laravel-ckeditor);
*   Slug - [https://github.com/cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable);
*   Lang - [https://github.com/caouecs/Laravel-lang](https://github.com/caouecs/Laravel-lang);
*   Helper - [https://github.com/barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper);
*   Email - [https://mailtrap.io/](https://mailtrap.io/);
*   Avatar - [https://ru.gravatar.com/](https://ru.gravatar.com/);
