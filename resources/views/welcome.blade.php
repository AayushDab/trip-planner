<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel AI</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white">

<!-- NAVBAR -->
<div class="space-x-8 mt-5 mb-5 px-6">

    <a href="/" class="hover:text-blue-400">Home</a>

    @guest
        <a href="{{ route('register') }}" class="bg-blue-500 px-4 py-2 rounded-xl">
            Sign Up
        </a>

        <a href="{{ route('login') }}" class="hover:text-blue-400">
            Login
        </a>
    @endguest

    @auth
        <a href="/trip" class="hover:text-blue-400">Plan Trip</a>
        <a href="/my-trips" class="hover:text-blue-400">My Trips</a>
        <a href="/dashboard" class="hover:text-blue-400">Dashboard</a>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="text-red-400">Logout</button>
        </form>
    @endauth

</div>

<!-- HERO SECTION -->
<section class="min-h-screen bg-gradient-to-br from-black via-blue-950 to-indigo-950 flex items-center relative overflow-hidden">

    <!-- Background Effects -->
    <div class="absolute w-96 h-96 bg-blue-500/20 rounded-full blur-3xl top-20 left-10"></div>
    <div class="absolute w-96 h-96 bg-purple-500/20 rounded-full blur-3xl bottom-10 right-10"></div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center px-10 relative z-10">

        <!-- LEFT SIDE -->
        <div>

            <h1 class="text-7xl font-extrabold leading-tight mb-8">
                Plan Your <span class="text-blue-400">Dream Trip</span>
                with Smart Artificial Intelligence
            </h1>

            <p class="text-gray-300 text-xl leading-relaxed mb-10">
                Create personalized travel itineraries,
                discover hotels, calculate budgets,
                and explore destinations with AI assistance.
            </p>

            <div class="flex gap-5">
                <a href="/trip"
                   class="bg-blue-500 hover:bg-blue-600 px-8 py-4 rounded-2xl text-lg font-bold transition hover:scale-105 shadow-xl shadow-blue-500/30">
                    Start Planning 🚀
                </a>

                <a href="#features"
                   class="border border-white/20 px-8 py-4 rounded-2xl hover:bg-white hover:text-black transition">
                    Explore Features
                </a>
            </div>

            <!-- STATS -->
            <div class="flex gap-12 mt-16">

                <div>
                    <h2 class="text-4xl font-bold text-blue-400">10K+</h2>
                    <p class="text-gray-400">Trips Generated</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold text-blue-400">120+</h2>
                    <p class="text-gray-400">Destinations</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold text-blue-400">AI</h2>
                    <p class="text-gray-400">Powered</p>
                </div>

            </div>
        </div>

        <!-- RIGHT SIDE (UPDATED AI SUGGESTIONS) -->
        <div class="relative flex justify-center items-center">

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-8 w-full max-w-md shadow-2xl relative overflow-hidden">

                <!-- Glow -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500/30 rounded-full blur-3xl"></div>

                <h2 class="text-3xl font-bold mb-2 text-white">
                    🌍 AI Travel Inspirations
                </h2>

                <p class="text-gray-300 mb-6 text-sm">
                    Not sure where to go? Try these ideas 👇
                </p>

                <div class="space-y-5">

                    <div class="bg-white/5 p-5 rounded-2xl hover:scale-105 transition border border-white/10">
                        <h3 class="text-xl font-bold text-blue-400">🏔️ Manali Adventure</h3>
                        <p class="text-gray-300 mt-2 text-sm">3 days snow escape under ₹20,000</p>
                    </div>

                    <div class="bg-white/5 p-5 rounded-2xl hover:scale-105 transition border border-white/10">
                        <h3 class="text-xl font-bold text-blue-400">🏝️ Goa Beach Trip</h3>
                        <p class="text-gray-300 mt-2 text-sm">4-day relaxing coastal vacation</p>
                    </div>

                    <div class="bg-white/5 p-5 rounded-2xl hover:scale-105 transition border border-white/10">
                        <h3 class="text-xl font-bold text-blue-400">🏙️ Dubai Luxury</h3>
                        <p class="text-gray-300 mt-2 text-sm">Premium international experience</p>
                    </div>

                    <div class="bg-white/5 p-5 rounded-2xl hover:scale-105 transition border border-white/10">
                      <h3 class="text-xl font-bold text-blue-400">🗼 Paris Romance</h3>
                    <p class="text-gray-300 mt-2 text-sm">Eiffel Tower, museums & romantic city vibes</p>
                    </div>

                </div>

                <a href="/trip"
                   class="mt-6 block text-center bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-2xl font-bold transition">
                    ✈️ Plan My Trip Now
                </a>

            </div>
        </div>

    </div>
</section>

<!-- FEATURES -->
<section id="features" class="py-24 bg-gray-900">

    <div class="max-w-7xl mx-auto px-10">

        <h2 class="text-5xl font-bold text-center mb-16">
            Smart AI Features 🚀
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:scale-105 transition">
                <h3 class="text-2xl font-bold mb-4 text-blue-400">AI Itinerary</h3>
                <p class="text-gray-300">Generate complete day-wise trip plans using AI.</p>
            </div>

            <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:scale-105 transition">
                <h3 class="text-2xl font-bold mb-4 text-blue-400">Budget Planner</h3>
                <p class="text-gray-300">Calculate smart travel budgets automatically.</p>
            </div>

            <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:scale-105 transition">
                <h3 class="text-2xl font-bold mb-4 text-blue-400">Weather Forecast</h3>
                <p class="text-gray-300">Get real-time weather updates for destinations.</p>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-blue-700 to-indigo-800 text-center">

    <h2 class="text-5xl font-bold mb-6">
        Start Your AI Journey Today ✈️
    </h2>

    <p class="text-xl mb-10">
        Build smarter trips in seconds.
    </p>

    <a href="/trip"
       class="bg-white text-black px-10 py-5 rounded-2xl text-lg font-bold hover:scale-105 transition">
        Plan Now
    </a>

</section>

<!-- FOOTER -->
<footer class="bg-black py-8 text-center text-gray-400">
    © {{ date('Y') }} Travel AI. All rights reserved.
</footer>

</body>
</html>