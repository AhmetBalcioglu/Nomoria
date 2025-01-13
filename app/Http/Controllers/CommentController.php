<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;


class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments', compact('comments'));
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(CommentStoreRequest $request)
    {
        Comment::create($request->all());
        return redirect()->route('comments.index')->with('success', 'Yorumunuz eklendi.');
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('comments.index')->with('success', 'Yorumunuz güncellendi.');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Yorumunuz silindi.');
    }

}






