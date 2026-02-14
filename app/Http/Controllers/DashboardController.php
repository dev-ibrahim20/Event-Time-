<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use App\Models\Career;
use App\Models\Offer;
use App\Models\QuoteRequest;
use App\Models\ContactMessage;
use App\Models\Client;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get basic counts
        $servicesCount = Service::count();
        $productsCount = Product::count();
        $careersCount = Career::count();
        $offersCount = Offer::count();
        $quoteRequestsCount = QuoteRequest::count();
        $contactMessagesCount = ContactMessage::count();
        $clientsCount = Client::count();
        $portfoliosCount = Portfolio::count();

        // Get recent activities
        $recentQuoteRequests = QuoteRequest::latest()->take(5)->get();
        $recentContactMessages = ContactMessage::latest()->take(5)->get();
        $recentServices = Service::latest()->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();

        // Monthly statistics for the last 6 months
        $monthlyStats = $this->getMonthlyStatistics();

        // Quote requests by status
        $quoteRequestsByStatus = QuoteRequest::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // Services and Products categories distribution
        $servicesCategories = Service::select('title_ar', DB::raw('count(*) as count'))
            ->groupBy('title_ar')
            ->get();

        $productsCategories = Product::select('category_ar', DB::raw('count(*) as count'))
            ->whereNotNull('category_ar')
            ->groupBy('category_ar')
            ->get();

        // Recent growth trends
        $growthTrends = $this->getGrowthTrends();

        return view('admin.dashboard', compact(
            'servicesCount',
            'productsCount', 
            'careersCount',
            'offersCount',
            'quoteRequestsCount',
            'contactMessagesCount',
            'clientsCount',
            'portfoliosCount',
            'recentQuoteRequests',
            'recentContactMessages',
            'recentServices',
            'recentProducts',
            'monthlyStats',
            'quoteRequestsByStatus',
            'servicesCategories',
            'productsCategories',
            'growthTrends'
        ));
    }

    private function getMonthlyStatistics()
    {
        $months = [];
        $quoteRequestsData = [];
        $contactMessagesData = [];
        $servicesData = [];
        $productsData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('M Y');
            $months[] = $monthName;

            $quoteRequestsData[] = QuoteRequest::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $contactMessagesData[] = ContactMessage::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $servicesData[] = Service::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $productsData[] = Product::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return [
            'months' => $months,
            'quoteRequests' => $quoteRequestsData,
            'contactMessages' => $contactMessagesData,
            'services' => $servicesData,
            'products' => $productsData
        ];
    }

    private function getGrowthTrends()
    {
        $currentMonth = Carbon::now();
        $previousMonth = Carbon::now()->subMonth();

        return [
            'quoteRequests' => [
                'current' => QuoteRequest::whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->count(),
                'previous' => QuoteRequest::whereMonth('created_at', $previousMonth->month)
                    ->whereYear('created_at', $previousMonth->year)
                    ->count()
            ],
            'contactMessages' => [
                'current' => ContactMessage::whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->count(),
                'previous' => ContactMessage::whereMonth('created_at', $previousMonth->month)
                    ->whereYear('created_at', $previousMonth->year)
                    ->count()
            ],
            'services' => [
                'current' => Service::whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->count(),
                'previous' => Service::whereMonth('created_at', $previousMonth->month)
                    ->whereYear('created_at', $previousMonth->year)
                    ->count()
            ],
            'products' => [
                'current' => Product::whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->count(),
                'previous' => Product::whereMonth('created_at', $previousMonth->month)
                    ->whereYear('created_at', $previousMonth->year)
                    ->count()
            ]
        ];
    }

    public function getAnalyticsData(Request $request)
    {
        $type = $request->get('type', 'monthly');
        $period = $request->get('period', 6);

        switch ($type) {
            case 'monthly':
                return response()->json($this->getMonthlyStatistics());
            case 'growth':
                return response()->json($this->getGrowthTrends());
            case 'status':
                $quoteRequestsByStatus = QuoteRequest::select('status', DB::raw('count(*) as count'))
                    ->groupBy('status')
                    ->get();
                return response()->json($quoteRequestsByStatus);
            default:
                return response()->json(['error' => 'Invalid analytics type'], 400);
        }
    }
}
