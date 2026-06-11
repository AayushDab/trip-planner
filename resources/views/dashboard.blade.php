<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AI Trip Planner</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<!-- DELETE ACCOUNT MODAL -->
 
<div id="deleteModal"
     class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50">

    <div class="bg-gray-900 p-8 rounded-3xl w-full max-w-md border border-red-500">

        <h2 class="text-2xl font-bold text-red-400 mb-4">
            Delete Account
        </h2>

        <p class="text-gray-300 mb-6">
            This action cannot be undone.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <input
                type="password"
                name="password"
                required
                placeholder="Enter your password"
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700 mb-4">

            <div class="flex gap-4">

                <button type="submit"
                        class="bg-red-600 px-5 py-3 rounded-xl">
                    Delete
                </button>

                <button type="button"
                        onclick="document.getElementById('deleteModal').classList.add('hidden')"
                        class="bg-gray-700 px-5 py-3 rounded-xl">
                    Cancel
                </button>

            </div>

        </form>

    </div>

</div>
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
    <!-- PROFILE SECTION -->
<div class="mt-16">

    <h2 class="text-3xl font-bold mb-6 text-blue-400">
        👤 My Profile
    </h2>

    <div class="bg-white/5 border border-white/10 rounded-3xl p-8">

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <p class="text-gray-400">Name</p>
                <p class="text-xl font-semibold">
                    {{ auth()->user()->name }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">Email</p>
                <p class="text-xl font-semibold">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">Member Since</p>
                <p class="text-xl font-semibold">
                    {{ auth()->user()->created_at->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="text-gray-400">Status</p>
                <p class="text-green-400 font-semibold">
                    Active
                </p>
            </div>

        </div>

        <div class="mt-8 flex gap-4">

            <a href="{{ route('profile.edit') }}"
               class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl font-bold">
                Edit Profile
            </a>

            <button
                onclick="document.getElementById('deleteModal').classList.remove('hidden')"
                class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-xl font-bold">
                Delete Account
            </button>

        </div>

    </div>

</div>

</div>

</body>
</html>