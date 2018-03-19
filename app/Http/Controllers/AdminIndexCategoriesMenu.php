<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesMenuParent;

class AdminIndexCategoriesMenu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_parent = CategoriesMenuParent::all();
        return view('admin.categories_menu.index')->with('menu_parent', $menu_parent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_parent = CategoriesMenuParent::where('parent_id', 0)->get();
        return view('admin.categories_menu.create')->with('menu_parent', $menu_parent);
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
            'weight' => 'required|max:100'
        ]);

        $menu_parent = new CategoriesMenuParent();
        $menu_parent->title = $request->title;
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
        $menu_parent = CategoriesMenuParent::find($id);
        return view('admin.categories_menu.edit')->with('menu_parent', $menu_parent);
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
            'weight' => 'required|max:100'
        ]);

        $menu_parent = CategoriesMenuParent::find($id);
        $menu_parent->title = $request->title;
        $menu_parent->weight = $request->weight;
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
