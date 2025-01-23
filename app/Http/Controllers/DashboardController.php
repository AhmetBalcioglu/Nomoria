<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $viewStats = Restaurant::withCount([
            'views as total_views',
            'views as daily_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->startOfDay());
            },
            'views as weekly_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->subDays(7));
            },
            'views as monthly_unique_users' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                    ->where('viewed_at', '>=', now()->subDays(30));
            },

        ])->get();

        return view('dashboard.admin', compact('viewStats'));
    }

    public function OwnerRestaurants()
    {
        return view('dashboard.owner');
    }

    public function showAnaliz($restaurantID)
    {
        // Restoran bilgilerini getir
        $restaurant = Restaurant::where('restaurantID', $restaurantID)->firstOrFail();

        // Restoran analiz istatistiklerini çek
        $viewStats = Restaurant::where('restaurantID', $restaurantID)
            ->withCount([
                'views as total_views',
                'views as daily_unique_users' => function ($query) {
                    $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                        ->where('viewed_at', '>=', now()->startOfDay());
                },
                'views as weekly_unique_users' => function ($query) {
                    $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                        ->where('viewed_at', '>=', now()->subDays(7));
                },
                'views as monthly_unique_users' => function ($query) {
                    $query->select(DB::raw('COUNT(DISTINCT COALESCE(userID, guestID))'))
                        ->where('viewed_at', '>=', now()->subDays(30));
                }
            ])
            ->first();

        return view('dashboard.restaurantManager.restaurantAnaliz', compact('restaurant', 'viewStats'));
    }

    public function getComments($restaurantID)
    {
        $comments = Comment::where('restaurantID', $restaurantID)->get();
        return view('dashboard.comments', compact('comments'));
    }
}
