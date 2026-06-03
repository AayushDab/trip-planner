<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips - Travel AI</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white min-h-screen">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-5 bg-black/30 backdrop-blur-lg border-b border-white/10">

    <h1 class="text-3xl font-bold text-blue-400">
        Travel with AI ✈️
    </h1>

    <div class="space-x-6">
        <a href="/">Home</a>
        <a href="/trip">Plan Trip</a>
        <a href="/dashboard">Dashboard</a>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-8 py-20">

    <div class="flex justify-between items-center mb-12">
        <h1 class="text-5xl font-bold">My Trips ✈️</h1>

        <a href="/trip"
           class="bg-blue-500 px-6 py-3 rounded-xl font-bold">
            + New Trip
        </a>
    </div>

    @forelse($trips as $trip)

        <div class="bg-white/5 p-6 rounded-2xl mb-6">

            <h2 class="text-3xl font-bold text-blue-400">
                📍 {{ $trip->destination }}
            </h2>

            <p class="text-sm text-gray-400 mt-2">
                {{ ucfirst($trip->category) }}
            </p>

            <div class="grid md:grid-cols-3 gap-4 mt-4">

                <div>
                    <p>Days</p>
                    <p class="font-bold">{{ $trip->days }}</p>
                </div>

                <div>
                    <p>Budget</p>
                    <p class="font-bold">₹{{ number_format($trip->budget) }}</p>
                </div>

                <div>
                    <p>Created</p>
                    <p class="font-bold">{{ $trip->created_at->format('d M Y') }}</p>
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="mt-5 flex gap-4">

                <button
                    onclick="document.getElementById('trip-{{ $trip->id }}').classList.toggle('hidden')"
                    class="bg-blue-600 px-4 py-2 rounded-lg">
                    View Itinerary
                </button>

                <a href="/trip/download/{{ $trip->id }}"
                   class="bg-green-600 px-4 py-2 rounded-lg">
                    Download
                </a>

            </div>

            <!-- ITINERARY -->
            <div id="trip-{{ $trip->id }}"
                 class="hidden mt-4 bg-black/30 p-4 rounded-lg whitespace-pre-wrap">

                {!! nl2br(e($trip->ai_plan ?? 'No itinerary found')) !!}

            </div>

        </div>

    @empty

        <p>No trips found.</p>

    @endforelse

</div>

</body>
</html>