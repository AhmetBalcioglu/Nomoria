<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $viewStats = Restaurant::withCount([
            'views as total_views',
            'views as daily_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->startOfDay()); // Bugün
            },
            'views as weekly_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->subDays(7)); // Son 7 gün
            },
            'views as monthly_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->subDays(30)); // Son 30 gün
            },

        ])->get();

        return view('dashboard.admin', compact('viewStats'));
    }

    public function OwnerRestaurants(){
        return view('dashboard.owner');
    }
}
