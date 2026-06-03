<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trip Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden">

    <!-- TOP IMAGE -->
    <img
        src="https://source.unsplash.com/1200x400/?{{ urlencode($trip->destination) }},travel"
        class="w-full h-72 object-cover"
    >

    <div class="p-8">

        <!-- HEADER -->
        <h1 class="text-4xl font-bold text-gray-800 mb-6">
            ✈️ Your Trip Plan
        </h1>

        <!-- INFO GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

            <div class="bg-blue-50 p-5 rounded-xl">
                <p class="text-gray-500 text-sm">Destination</p>
                <p class="text-2xl font-bold text-blue-700">
                    {{ $trip->destination }}
                </p>
            </div>

            <div class="bg-green-50 p-5 rounded-xl">
                <p class="text-gray-500 text-sm">Days</p>
                <p class="text-2xl font-bold text-green-700">
                    {{ $trip->days }}
                </p>
            </div>

            <div class="bg-purple-50 p-5 rounded-xl">
                <p class="text-gray-500 text-sm">Budget</p>
                <p class="text-2xl font-bold text-purple-700">
                    ₹{{ $trip->budget }}
                </p>
            </div>

        </div>

        <!-- PREFERENCES -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-2">🎯 Preferences</h2>

            <div class="bg-gray-50 border rounded-xl p-4">
                {{ $trip->preferences ?? 'No preferences added' }}
            </div>
        </div>

        <!-- AI GENERATED PLAN -->
        <div class="mb-8">

            <h2 class="text-2xl font-bold mb-4">
                🤖 AI Generated Travel Plan
            </h2>

            <div class="bg-gray-50 border rounded-xl p-6 shadow-sm">

                <pre class="whitespace-pre-wrap text-gray-700 leading-7 font-sans">
{{ session('ai_plan') ?? 'AI plan not generated yet.' }}
                </pre>

            </div>

        </div>

        <!-- BACK BUTTON -->
        <div class="text-center mt-10">

            <a href="/trip"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition">
                ← Plan Another Trip
            </a>

        </div>

    </div>

</div>

</body>
</html>