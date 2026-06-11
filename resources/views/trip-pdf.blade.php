<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            padding:30px;
        }

        h1{
            color:#2563eb;
            text-align:center;
        }

        .card{
            border:1px solid #ddd;
            padding:15px;
            margin-bottom:20px;
            border-radius:10px;
        }

        .itinerary{
            margin-top:20px;
            line-height:1.8;
            white-space: pre-wrap;
        }

    </style>
</head>
<body>

    <h1>✈️ Travel AI Itinerary</h1>

    <div class="card">

        <h2>{{ $trip->destination }}</h2>

        <p>
            <strong>Travel Date:</strong>
            {{ $trip->travel_date }}
        </p>

        <p>
            <strong>Days:</strong>
            {{ $trip->days }}
        </p>

        <p>
            <strong>Travelers:</strong>
            {{ $trip->people }}
        </p>

        <p>
            <strong>Budget:</strong>
            ₹{{ number_format($trip->budget) }}
        </p>

        <p>
            <strong>Category:</strong>
            {{ ucfirst($trip->category) }}
        </p>

    </div>

    <h2>Trip Plan</h2>

    <div class="itinerary">
        {!! nl2br(e($trip->ai_plan)) !!}
    </div>

</body>
</html>