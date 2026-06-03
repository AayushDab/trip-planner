<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Trip Planner</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image:url('{{ asset('images/bg.jpg') }}')">

<div class="min-h-screen bg-black/60 flex items-center justify-center p-6">

    <div class="w-full max-w-6xl grid md:grid-cols-2 gap-8">

        <!-- LEFT SIDE FORM -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">

            <!-- TOP BUTTONS -->
            <div class="flex gap-3 mb-6">

                <a href="/"
                   class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg font-medium transition">
                    ← Home
                </a>

                <a href="/my-trips"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                    📋 My Trips
                </a>

            </div>

            <h1 class="text-4xl font-bold mb-2">
                ✈️ AI Trip Planner
            </h1>

            <p class="text-gray-600 mb-6">
                Enter your travel details and generate a personalized itinerary.
            </p>

            <form method="POST" action="/trip/store" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-1 font-medium">
                        Destination
                    </label>

                    <input
                        type="text"
                        name="destination"
                        required
                        class="w-full border rounded-lg p-3"
                        placeholder="e.g. Paris, Goa, Tokyo">
                </div>

                <div>
                    <label class="block mb-1 font-medium">
                        Travel Date
                    </label>

                    <input
                        type="date"
                        name="travel_date"
                        required
                        class="w-full border rounded-lg p-3">
                </div>

                <div>
                    <label class="block mb-1 font-medium">
                        Number of Days
                    </label>

                    <input
                        type="number"
                        name="days"
                        required
                        min="1"
                        class="w-full border rounded-lg p-3"
                        placeholder="e.g. 5">
                </div>

                <div>
                    <label class="block mb-1 font-medium">
                        Number of Travelers
                    </label>

                    <input
                        type="number"
                        name="people"
                        required
                        min="1"
                        class="w-full border rounded-lg p-3"
                        placeholder="e.g. 2">
                </div>

                <div>
                    <label class="block mb-1 font-medium">
                        Budget
                    </label>

                    <input
                        type="number"
                        name="budget"
                        required
                        class="w-full border rounded-lg p-3"
                        placeholder="e.g. 50000">
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg font-semibold">

                    Generate Trip
                </button>
            </form>

        </div>

        <!-- RIGHT SIDE RESULT -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 overflow-y-auto max-h-[85vh]">

            <h2 class="text-3xl font-bold mb-4">
                Generated Itinerary
            </h2>

            @if(session('ai_plan'))

                <div class="bg-green-50 border border-green-200 rounded-lg p-5">

                    <div class="whitespace-pre-wrap text-gray-800 leading-7">

                        {!! nl2br(e(session('ai_plan'))) !!}

                    </div>

                    <!-- BUTTONS AFTER GENERATION -->
                    <div class="mt-6 flex gap-4">

                        <a href="/trip"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg font-semibold transition">
                            ← New Trip
                        </a>

                        <a href="/"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition">
                            🏠 Home
                        </a>

                    </div>

                </div>

            @else

                <div class="bg-gray-50 border rounded-lg p-6 text-center">

                    <p class="text-gray-500 text-lg">
                        Fill the form and click
                        <strong>Generate Trip</strong>
                        to create your itinerary.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>