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
        $request->validate([
            'destination' => 'required|string',
            'travel_date' => 'required|date',
            'days' => 'required|integer',
            'people' => 'required|integer',
            'budget' => 'required|numeric',
            'category' => 'required|string',
        ]);

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

        $trip = Trip::create([
            'user_id' => Auth::id(),
            'destination' => $request->destination,
            'travel_date' => $request->travel_date,
            'days' => $request->days,
            'people' => $request->people,
            'budget' => $request->budget,
            'category' => $request->category,
            'ai_plan' => $ai,
        ]);

        return redirect('/trip')->with([
    'ai_plan' => $ai,
    'trip_id' => $trip->id,
]);
    }

    public function myTrips()
    {
        $trips = Trip::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('my-trips', compact('trips'));
    }

    public function download($id)
    {
        $trip = Trip::findOrFail($id);

        $content = $trip->ai_plan ?? 'No itinerary found';

        $fileName = 'trip-' . preg_replace('/[^A-Za-z0-9\-]/', '_', $trip->destination) . '.txt';

        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="'.$fileName.'"');
    }
}