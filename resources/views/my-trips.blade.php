<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips - Travel AI</title>

```
@vite(['resources/css/app.css','resources/js/app.js'])
```

</head>

<body class="bg-gray-950 text-white min-h-screen">

<!-- NAVBAR -->

<nav class="flex flex-col md:flex-row justify-between items-center gap-4 px-4 md:px-10 py-5 bg-black/30 backdrop-blur-lg border-b border-white/10">

```
<h1 class="text-3xl font-bold text-blue-400">
    Travel with AI ✈️
</h1>

<div class="flex flex-wrap justify-center gap-4">
    <a href="/" class="hover:text-blue-400">Home</a>
    <a href="/trip" class="hover:text-blue-400">Plan Trip</a>
    <a href="/dashboard" class="hover:text-blue-400">Dashboard</a>
</div>
```

</nav>

<div class="max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-20">

```
<div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-12">

    <h1 class="text-3xl md:text-5xl font-bold">
        My Trips ✈️
    </h1>

    <div class="flex flex-col sm:flex-row gap-3">

        <a href="/dashboard"
           class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-xl font-bold text-center">
            ← Dashboard
        </a>

        <a href="/trip"
           class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold text-center">
            + New Trip
        </a>

    </div>

</div>

@forelse($trips as $trip)

    <div class="bg-white/5 border border-white/10 p-6 rounded-2xl mb-6">

        <h2 class="text-2xl md:text-3xl font-bold text-blue-400">
            📍 {{ $trip->destination }}
        </h2>

        <p class="text-sm text-gray-400 mt-2">
            {{ ucfirst($trip->category) }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

            <div>
                <p class="text-gray-400">Days</p>
                <p class="font-bold">{{ $trip->days }}</p>
            </div>

            <div>
                <p class="text-gray-400">Budget</p>
                <p class="font-bold">₹{{ number_format($trip->budget) }}</p>
            </div>

            <div>
                <p class="text-gray-400">Created</p>
                <p class="font-bold">{{ $trip->created_at->format('d M Y') }}</p>
            </div>

        </div>

        <!-- BUTTONS -->
        <div class="mt-5 flex flex-col sm:flex-row gap-4">

            <button
                onclick="document.getElementById('trip-{{ $trip->id }}').classList.toggle('hidden')"
                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-center">
                View Itinerary
            </button>

            <a href="/trip/download/{{ $trip->id }}"
               class="w-full sm:w-auto bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-center">
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

    <div class="text-center py-12">
        <p class="text-xl text-gray-400 mb-4">
            No trips found.
        </p>

        <a href="/trip"
           class="inline-block bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-bold">
            Create Your First Trip
        </a>
    </div>

@endforelse
```

</div>

</body>
</html>
