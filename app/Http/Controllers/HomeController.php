<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Trip;

class HomeController extends Controller
{
    public function index()
    {
        $latestTrips = [];

        if (Auth::check()) {
            $latestTrips = Trip::where('user_id', Auth::id())
                ->latest()
                ->take(3)
                ->get();
        }

        return view('welcome', compact('latestTrips'));
    }
}