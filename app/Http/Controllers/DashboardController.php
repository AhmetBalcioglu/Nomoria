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

        $restaurant = Restaurant::where('restaurantID', $restaurantID)->firstOrFail();


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

    public function showAnalytics($restaurantID)
    {
        $restaurant = Restaurant::where('restaurantID', $restaurantID)->firstOrFail();

        $viewStats = DB::table('viewed_restaurants')
            ->selectRaw('
            COUNT(*) as total_views,
            COUNT(DISTINCT CASE WHEN viewed_at >= ? THEN COALESCE(userID, guestID) END) as daily_unique_users,
            COUNT(DISTINCT CASE WHEN viewed_at >= ? THEN COALESCE(userID, guestID) END) as weekly_unique_users,
            COUNT(DISTINCT CASE WHEN viewed_at >= ? THEN COALESCE(userID, guestID) END) as monthly_unique_users
        ', [
                now()->startOfDay(),
                now()->subDays(7),
                now()->subDays(30),
            ])
            ->where('restaurantID', $restaurantID)
            ->first();

        // Varsayılan değerler atanıyor, eğer $viewStats null ise
        $viewStats = $viewStats ?? (object) [
            'total_views' => 0,
            'daily_unique_users' => 0,
            'weekly_unique_users' => 0,
            'monthly_unique_users' => 0,
        ];

        $dailyData = $this->getChartData($restaurantID, now()->startOfDay(), 'daily');
        $weeklyData = $this->getChartData($restaurantID, now()->subDays(7), 'weekly');
        $monthlyData = $this->getChartData($restaurantID, now()->subDays(30), 'monthly');

        return view('dashboard.restaurantAnalytics.restaurantAnalytics', compact('restaurant', 'viewStats', 'restaurantID', 'dailyData', 'weeklyData', 'monthlyData'));
    }


    private function getChartData($restaurantID, $startDate, $period)
    {
        return DB::table('viewed_restaurants')
            ->selectRaw('
            DATE(viewed_at) as date,
            COUNT(*) as views
        ')
            ->where('restaurantID', $restaurantID)
            ->where('viewed_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get()->pluck('views', 'date');
    }


    public function showControlPanel($restaurantID = null)
    {
        $role = session('role');
        $userId = session('userID');

        if (!$userId) {

            return redirect()->route('login')->with('error', 'Lütfen giriş yapın');
        }

        if ($role == 'restaurantOwner') {

            $restaurants = Restaurant::where('userID', $userId)
                ->where('deleted_at', null)

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
                ->get();

            if ($restaurants->isEmpty()) {
                return view('dashboard.controlPanel.controlpanel')->with('message', 'Bu kullanıcıya ait restoran bulunamadı.');
            }

            return view('dashboard.controlPanel.controlpanel', compact('restaurants'));
        } elseif ($role == 'admin') {


            if ($restaurantID) {

                $restaurant = Restaurant::where('restaurantID', $restaurantID)->firstOrFail();

                return view('dashboard.controlPanel.controlpanel', compact('restaurant'));
            } else {

                $restaurants = Restaurant::where('deleted_at', null)
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

                    ])->get();


                return view('dashboard.controlPanel.controlpanel', compact('restaurants'));
            }
        } else {

            abort(403, 'Bu sayfaya erişim yetkiniz yok.');
        }
    }
}
