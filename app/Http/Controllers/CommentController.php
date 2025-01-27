<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
{
    //Comment modelinden tüm bilgiler alınır ve comments sayfasına gonderilir ve comments döndürülür.
    public function index()
    {
        $comments = Comment::all();
        return view('comments', compact('comments'));
    }

    //Yorum oluşturulmak için kullanılır.
    public function store(Request $request)
    {
        // Veriyi doğrulama
        $request->validate([
            'restaurantID' => 'required|exists:restaurant,restaurantID',
            'content' => 'required|string|max:500',
        ]);

        // Kullanıcı oturumundan ID'yi alın
        $userID = Session::get('userID');

        //Eğer oturum yoksa hata mesajı döndür
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

    //Yorum güncellenmek için kullanılır.
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

        //Eğer oturum yoksa hata mesajı döndür
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

    //Yorum silmek için kullanılır.
    public function destroy($comment_id)
    {
        // Yorum kaydını bul
        $comment = Comment::findOrFail($comment_id);

        // Kullanıcı oturumundan ID'yi alın
        $userID = Session::get('userID');

        //Eğer oturum yoksa hata mesajı döndür
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
