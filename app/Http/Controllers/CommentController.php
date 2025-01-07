<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CreateCommentsTable extends Controller
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
            'name'=>'required',
            'comment'=>'required',
            'rating'=>'required'
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






