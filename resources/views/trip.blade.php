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

            <h1 class="text-4xl font-bold mb-6">
                ✈️ AI Trip Planner
            </h1>

            <form method="POST" action="/trip/store" class="space-y-4">
                @csrf

                <!-- DESTINATION -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Destination
                    </label>
                    <input type="text" name="destination"
                           placeholder="e.g. Paris, Goa, Tokyo"
                           class="w-full border p-3 rounded-lg"
                           required>
                </div>

                <!-- TRAVEL DATE -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Travel Date
                    </label>
                    <input type="date" name="travel_date"
                           class="w-full border p-3 rounded-lg"
                           required>
                </div>

                <!-- DAYS -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Number of Days
                    </label>
                    <input type="number" name="days"
                           placeholder="e.g. 5"
                           class="w-full border p-3 rounded-lg"
                           required>
                </div>

                <!-- PEOPLE -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Number of Travelers
                    </label>
                    <input type="number" name="people"
                           placeholder="e.g. 2"
                           class="w-full border p-3 rounded-lg"
                           required>
                </div>

                <!-- BUDGET -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Budget (₹)
                    </label>
                    <input type="number" name="budget"
                           placeholder="e.g. 50000"
                           class="w-full border p-3 rounded-lg"
                           required>
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">
                        Trip Category
                    </label>
                    <select name="category"
                            class="w-full border p-3 rounded-lg"
                            required>
                        <option value="personal">Personal</option>
                        <option value="family">Family</option>
                        <option value="business">Business</option>
                    </select>
                </div>

                <!-- SUBMIT -->
                <button type="submit"
                        class="w-full bg-blue-600 text-white p-3 rounded-lg font-bold">
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

                    <div class="mt-6 flex flex-wrap gap-4">

                        @if(session('trip_id'))
                            <a href="/trip/download/{{ session('trip_id') }}"
                               class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold">
                                ⬇️ Download Itinerary
                            </a>
                        @endif

                        <a href="/my-trips"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold">
                            📁 My Trips
                        </a>

                        <a href="/trip"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg font-semibold">
                            ➕ New Trip
                        </a>

                    </div>

                </div>

            @else

                <div class="bg-gray-50 border rounded-lg p-6 text-center">
                    <p class="text-gray-500 text-lg">
                        Fill the form and click <strong>Generate Trip</strong>
                    </p>
                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>