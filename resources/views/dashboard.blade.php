<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AI Trip Planner</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white min-h-screen">
    
<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-5 bg-black/30 backdrop-blur-lg border-b border-white/10">

    <h1 class="text-3xl font-bold text-blue-400">
        Travel AI ✈️
    </h1>

    <div class="space-x-6">

        <a href="/" class="hover:text-blue-400">Home</a>
        <a href="/trip" class="hover:text-blue-400">Plan Trip</a>
        <a href="/my-trips" class="hover:text-blue-400">My Trips</a>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="text-red-400">Logout</button>
        </form>

    </div>

</nav>

<!-- BACKGROUND GLOW -->
<div class="fixed top-0 left-0 w-96 h-96 bg-blue-500/20 blur-3xl rounded-full"></div>
<div class="fixed bottom-0 right-0 w-96 h-96 bg-purple-500/20 blur-3xl rounded-full"></div>

<!-- CONTENT -->
<div class="relative z-10 max-w-7xl mx-auto px-8 py-20">

    <h1 class="text-6xl font-extrabold mb-4">
        Welcome 👋 {{ auth()->user()->name }}
    </h1>

    <p class="text-gray-400 text-xl mb-12">
        Your AI travel dashboard is ready
    </p>

    <!-- CARDS -->
    <div class="grid md:grid-cols-3 gap-8">

        <a href="/trip"
           class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:scale-105 transition">

            <h2 class="text-2xl font-bold text-blue-400">
                ✈️ Plan New Trip
            </h2>
            <p class="text-gray-400 mt-3">
                Create AI-powered travel itinerary
            </p>

        </a>

        <a href="/my-trips"
           class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:scale-105 transition">

            <h2 class="text-2xl font-bold text-green-400">
                📍 My Trips
            </h2>
            <p class="text-gray-400 mt-3">
                View saved travel plans
            </p>

        </a>

        <a href="/"
           class="bg-white/5 border border-white/10 p-8 rounded-3xl hover:scale-105 transition">

            <h2 class="text-2xl font-bold text-purple-400">
                🧠 AI Home
            </h2>
            <p class="text-gray-400 mt-3">
                Explore features & recommendations
            </p>

        </a>

    </div>

</div>

</body>
</html>