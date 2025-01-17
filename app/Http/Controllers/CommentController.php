<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Session;


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

    public function store(Request $request)
    {
        // Veriyi doğrulama
        $request->validate([
            'restaurantID' => 'required|exists:restaurant,restaurantID',
            'content' => 'required|string|max:500',
        ]);

        // Kullanıcı oturumundan ID'yi alın
        $userID = Session::get('userID');

        if (!$userID) {
            return redirect('/login')->with('error', 'Yorum yapmak için giriş yapmalısınız.');
        }

        // Yorum kaydını oluşturun
        Comment::create([
            'restaurantID' => $request->restaurantID,
            'user_name' => Session::get('name'),
            'rating' => $request->rating ?? 0,
            'userID' => $userID,
            'comment' => $request->input('content') ?? '',  // 'comment' kullanmalısınız
        ]);


        // Yorum başarıyla kaydedildiyse geri dön
        return back()->with('success', 'Yorumunuz eklendi.');
    }





    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    public function update($comment_id, Request $request)
    {
        // Verileri doğrula
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Yorum kaydını bul
        $comment = Comment::findOrFail($comment_id);

        // Kullanıcı oturumundan ID'yi alın
        $userID = Session::get('userID');

        if (!$userID) {
            return redirect('/login')->with('error', 'Yorumu güncellemek için giriş yapmalısınız.');
        }

        // Kullanıcının yetkisini kontrol edin
        if ($userID !== $comment->userID) {
            return back()->with('error', 'Bu yorumu güncelleme yetkiniz yok.');
        }

        // Yorum kaydını güncelle
        $comment->update([
            'comment' => $request->input('content'),
        ]);

        // Başarı mesajı ile geri dön
        return back()->with('success', 'Yorumunuz güncellendi.');
    }


    public function destroy($comment_id)
    {
        // Yorum kaydını bul
        $comment = Comment::findOrFail($comment_id);

        // Kullanıcı oturumundan ID'yi alın
        $userID = Session::get('userID');

        if (!$userID) {
            return redirect('/login')->with('error', 'Yorumu silmek için giriş yapmalısınız.');
        }

        // Kullanıcının yetkisini kontrol edin
        if ($userID !== $comment->userID) {
            return back()->with('error', 'Bu yorumu silme yetkiniz yok.');
        }

        // Yorumu sil
        $comment->delete();

        // Başarı mesajı ile geri dön
        return back()->with('success', 'Yorumunuz silindi.');
    }



}






