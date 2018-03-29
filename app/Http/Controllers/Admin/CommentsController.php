<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at','desc')->paginate(5);
        return view('admin.comments.index')->with('comments', $comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $comment = Comment::find($id);
        return view('admin.comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'email' => 'required|email|max:191',
            'comment' => 'required|min:5|max:2000',
        ]);

        $comment = Comment::find($id);
        $comment->title = $request->title;
        $comment->email = $request->email;
        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->route('comments.show',$comment->id)->with('success', 'Комментарий успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Комментарий удален!');
    }
}