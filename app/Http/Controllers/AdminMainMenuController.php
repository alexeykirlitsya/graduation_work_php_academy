<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenu;


class AdminMainMenuController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MainMenu::all();
        return view('admin.main_menu.index')->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_menu.create');
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

        $menu = new MainMenu();
        $menu->title = $request->title;
        $menu->weight = $request->weight;
        $menu->url = $request->url;
        $menu->save();

        return redirect()->route('main-menu.index')->with('success', 'Новый пункт меню «'.$request->title.'» - добавлен');
    }

    public function show($id)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $menu = MainMenu::find($id);
        return view('admin.main_menu.edit')->with('menu', $menu);
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

        $menu = MainMenu::find($id);
        $menu->title = $request->title;
        $menu->weight = $request->weight;
        $menu->url = $request->url;
        $menu->save();

        return redirect()->route('main-menu.index')->with('success', 'Пункт меню «'.$request->title.'» обновлен!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MainMenu::find($id);
        $menu->delete();

        return redirect()->route('main-menu.index')->with('success', 'Пункт меню «'.$menu->title.'» удален!');

    }
}
