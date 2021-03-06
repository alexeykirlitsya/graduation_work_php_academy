<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(5);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'description' => 'required|max:100',
            'text' => 'required'
        ]);

        Page::create($request->all());

        return redirect()->route('pages.index')->with('success', 'Новая страница «'.$request->title.'» добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        return redirect(route('single.page', $page->slug), 301);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        return view('admin.pages.edit', compact('page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'slug' => 'required|max:191',
            'description' => 'required|max:100',
            'text' => 'required'
        ]);

        $page = Page::whereSlug($slug)->firstOrFail();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->text = $request->text;
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Страница «'.$request->title.'» обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Страница «'.$page->title.'» удалена!');
    }
}