<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesMenuParent;

class CategoriesMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_parent = CategoriesMenuParent::where('parent_id', '=', 0)->orderBy('weight', 'asc')->get();
        $menu_children = CategoriesMenuParent::where('parent_id', '!=', 0)->orderBy('parent_id', 'asc')->orderBy('weight', 'asc')->get();

        //one parent-item in the table categories_children_menu
        $parent_item = [];
        foreach ($menu_parent as $value){
            $parent_item[$value->id] = $value->title;
        }

        return view('admin.categories_menu.index', compact('menu_parent', 'menu_children', 'parent_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get parent categories
        $menu_parent = CategoriesMenuParent::where('parent_id', '=', 0)->get();

        //make an array parent categories
        $parent_item = [];

        //add not parent category
        $parent_item[0] = 'Без родительской';
        foreach ($menu_parent as $value){
            $parent_item[$value->id] = $value->title;
        }

        return view('admin.categories_menu.create', compact('menu_parent', 'parent_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'url' => 'max:191',
            'weight' => 'required|max:100'
        ]);

        $menu_parent = new CategoriesMenuParent();
        $menu_parent->title = $request->title;

        if ($request->url == null){
            $menu_parent->url = '';
        } else{
            $menu_parent->url = $request->url;
        }

        $menu_parent->weight = $request->weight;

        if ($request->parent_id == 0){
            $menu_parent->parent_id = 0;
        } else{
            $menu_parent->parent_id = $request->parent_id;
        }
        $menu_parent->save();

        return redirect()->route('categories-menu.index')->with('success', 'Новый пункт меню «'.$request->title.'» - добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CategoriesMenuParent::find($id);
        $menu_parent = CategoriesMenuParent::where('parent_id', '=', 0)->get();

        $parent_item = [];
        $parent_item[0] = 'Без родительской';
        foreach ($menu_parent as $value){
            $parent_item[$value->id] = $value->title;
        }

        return view('admin.categories_menu.edit', compact('item', 'parent_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'url' => 'max:191',
            'weight' => 'required|max:100'
        ]);

        $menu_parent = CategoriesMenuParent::find($id);
        $menu_parent->title = $request->title;

        if ($request->url == null){
            $menu_parent->url = '';
        } else{
            $menu_parent->url = $request->url;
        }

        $menu_parent->weight = $request->weight;

        if ($request->parent_id == 0){
            $menu_parent->parent_id = 0;
        } else{
            $menu_parent->parent_id = $request->parent_id;
        }
        $menu_parent->save();

        return redirect()->route('categories-menu.index')->with('success', 'Пункт меню «'.$request->title.'» обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu_parent = CategoriesMenuParent::find($id);
        $menu_parent->delete();

        return redirect()->route('categories-menu.index')->with('success', 'Пункт меню «'.$menu_parent->title.'» удален!');
    }
}