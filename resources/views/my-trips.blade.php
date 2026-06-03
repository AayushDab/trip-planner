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

        <a href="/" class="hover:text-blue-400">
            Home
        </a>

        <a href="/trip" class="hover:text-blue-400">
            Plan Trip
        </a>

        <a href="/dashboard" class="hover:text-blue-400">
            Dashboard
        </a>

        <form method="POST"
              action="{{ route('logout') }}"
              class="inline">
            @csrf

            <button class="text-red-400 hover:text-red-300">
                Logout
            </button>
        </form>

    </div>

</nav>

<!-- BACKGROUND GLOW -->

<div class="fixed top-0 left-0 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>

<div class="fixed bottom-0 right-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>

<!-- CONTENT -->

<div class="max-w-7xl mx-auto px-8 py-20 relative z-10">

    <div class="flex justify-between items-center mb-12">

        <div>

            <h1 class="text-6xl font-extrabold">
                My Trips ✈️
            </h1>

            <p class="text-gray-400 mt-3 text-lg">
                View all your AI-generated travel plans
            </p>

        </div>

        <a href="/trip"
           class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/30 transition hover:scale-105">

            + New Trip

        </a>

    </div>

    @forelse($trips as $trip)

        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 mb-6 hover:scale-[1.02] transition">

            <div class="flex flex-col md:flex-row justify-between">

                <div>

                    <h2 class="text-3xl font-bold text-blue-400">
                        📍 {{ $trip->destination }}
                    </h2>

                    <div class="mt-5 grid md:grid-cols-3 gap-5">

                        <div class="bg-white/5 p-4 rounded-2xl">

                            <p class="text-gray-400 text-sm">
                                Duration
                            </p>

                            <p class="text-2xl font-bold">
                                {{ $trip->days }} Days
                            </p>

                        </div>

                        <div class="bg-white/5 p-4 rounded-2xl">

                            <p class="text-gray-400 text-sm">
                                Budget
                            </p>

                            <p class="text-2xl font-bold text-green-400">
                                ₹{{ number_format($trip->budget) }}
                            </p>

                        </div>

                        <div class="bg-white/5 p-4 rounded-2xl">

                            <p class="text-gray-400 text-sm">
                                Created
                            </p>

                            <p class="text-lg">
                                {{ $trip->created_at->format('d M Y') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="mt-6">

            </div>

        </div>

    @empty

        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-12 text-center">

            <div class="text-7xl mb-6">
                ✈️
            </div>

            <h2 class="text-3xl font-bold mb-4">
                No Trips Yet
            </h2>

            <p class="text-gray-400 mb-8">
                Create your first AI-powered travel itinerary.
            </p>

            <a href="/trip"
               class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-2xl font-bold">

                Create First Trip

            </a>

        </div>

    @endforelse

</div>

</body>
</html>