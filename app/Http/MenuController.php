<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MenuController extends Model
{
   /**
     * Menüleri filtrele.
     */
    public function filter(Request $request)
    {
        // Kullanıcıdan gelen filtreleme verileri
        $category = $request->input('category'); // Menü Kategorisi
        $availability = $request->input('availability'); // Mevcut Durumu

        // Sorgu oluşturma
        $query = Menu::query();

        if ($category) {
            $query->where('category', 'like', '%' . $category . '%');
        }

        if ($availability !== null) { // boolean bir değer olduğundan kontrol ediliyor
            $query->where('availability', $availability);
        }

        // Filtrelenmiş menüleri al
        $menus = $query->get();

        // Sonuçları döndür
        return view('menus.index', compact('menus'));
    }
}
