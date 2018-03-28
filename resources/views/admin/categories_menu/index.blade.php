@extends('layouts.app')

@section('title', 'Страница администратора: меню категорий')

@section('content')
    <a href="{{route('categories-menu.create')}}" class="btn link_add">Добавить новый пункт в меню категорий</a>
        <div class="col-md-12">
            <div class="dashed_line"></div>
            {{--menu_parent--}}
            @if(count($menu_parent) > 0)
                <h3 style="text-align: center">- Родительские категории -</h3>
                <table class="table">
                    <thead>
                        <th>Название</th>
                        <th>Вес <span class="star">*</span></th>
                        <th>URL</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($menu_parent as $parent)
                        <tr>
                            <td>{{ $parent->title }}</td>
                            <td>{{ $parent->weight }}</td>
                            <td>
                                @if($parent->url)
                                    <span class="fa fa-check-circle" style="color:green; font-size:18px;"></span>
                                @else
                                    <span class="fa fa-ban" style="color:red; font-size:18px;"></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories-menu.edit', $parent->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                            </td>
                            <td>
                                {{Form::open(['action' => ['Admin\CategoriesMenuController@destroy', $parent->id], 'method' => 'DELETE'])}}
                                {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                                @csrf
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="footnote"><span class="star">*</span> порядковый номер в котором будет выводиться категория в списке основного меню </div>
            @else
                <p>Пунктов в меню категорий нет...</p>
            @endif
            <div class="dashed_line"></div>

            {{--menu_children--}}
            @if(count($menu_children) > 0)
                <h3 style="text-align: center">- Дочерные категории -</h3>
                <table class="table">
                    <thead>
                        <th>Название</th>
                        <th>Вес <span class="star">*</span></th>
                        <th>Родитель</th>
                        <th>URL</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($menu_children as $children)
                        <tr>
                            <td>
                                @if($children->url == null)
                                    {{ $children->title }}
                                 @else
                                    <a href="{{ $children->url }}" target="_blank">{{ $children->title }}</a>
                                @endif
                            </td>
                            <td>{{ $children->weight }}</td>
                            <td>
                                {{Form::select('parent_id', $parent_item, $children->parent_id, ['disabled' => 'disabled', 'class' => 'admin_select_parent_menu'])}}
                            </td>
                            <td>
                                @if($children->url)
                                    <span class="fa fa-check-circle" style="color:green; font-size:18px;"></span>
                                    @else
                                    <span class="fa fa-ban" style="color:red; font-size:18px;"></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories-menu.edit', $children->id)}}" class="btn btn-warning btn-xs">Редактировать</a>
                            </td>
                            <td>
                                {{Form::open(['action' => ['Admin\CategoriesMenuController@destroy', $children->id], 'method' => 'DELETE'])}}
                                {{Form::submit('Удалить', ['class' => 'btn btn-danger btn-xs'])}}
                                @csrf
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="footnote"><span class="star">*</span> порядковый номер в котором будет выводиться подкатегория в списке родительского меню </div>
            @else
                <p>Пунктов в меню категорий нет...</p>
            @endif
        </div>
@endsection

@section('sidebar')
    @include('admin.sidebar')
@endsection