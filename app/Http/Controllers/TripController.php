<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\GroqService;

class TripController extends Controller
{
    public function index()
    {
        return view('trip');
    }

    public function store(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'destination' => 'required|string',
            'travel_date' => 'required|date',
            'days' => 'required|integer',
            'people' => 'required|integer',
            'budget' => 'required|numeric',
        ]);

        // 2. Save trip
        $trip = Trip::create([
            'user_id' => Auth::id(),
            'destination' => $request->destination,
            'travel_date' => $request->travel_date,
            'days' => $request->days,
            'people' => $request->people,
            'budget' => $request->budget,
        ]);

        // 3. Generate AI plan using GROQ
        try {

            $preferences = "Number of travelers: " . $request->people;

            $ai = app(GroqService::class)->generateTrip(
                $request->destination,
                $request->days,
                $request->budget,
                $preferences
            );

        } catch (\Throwable $e) {

            $ai = "AI Error: " . $e->getMessage();

        }

        // 4. Send to view
        return redirect('/trip')->with('ai_plan', $ai);
    }

    public function myTrips()
{
    $trips = Trip::where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('my-trips', compact('trips'));
}
}