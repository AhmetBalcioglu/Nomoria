<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index()
    {
        $comments= Comment::all();
        return view('comments',compact('comments'));
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required',
            'user_name' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ]);

        Comment::create($request->all());
        return redirect()->route('comments.index')->with('success', 'Yorumunuz eklendi.');

    }

    public function edit(Comment $comment)
    {
        return view('comment.edit',compact('comment'));

    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'rating'=>'required'
        ]);


        $comment->update($request->all());
        return redirect()->route('comments.index')->with('success', 'Yorumunuz güncellendi.');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Yorumunuz silindi.');
    }

}






