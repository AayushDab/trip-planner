<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function generateTrip($destination, $days, $budget, $preferences)
    {
        $prompt = "
Create a {$days}-day travel itinerary for {$destination}.

Budget: ₹{$budget}

Preferences: {$preferences}

Include:
- Day-wise plan
- Places to visit
- Food recommendations
- Hotel suggestions
- Budget breakdown
";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            "model" => "llama-3.1-8b-instant",
            "messages" => [
                [
                    "role" => "user",
                    "content" => $prompt
                ]
            ],
            "temperature" => 0.7
        ]);

        $data = $response->json();

        return $data['choices'][0]['message']['content']
            ?? "Groq Error: " . json_encode($data);
    }
}