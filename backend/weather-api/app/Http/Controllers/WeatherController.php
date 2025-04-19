<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// This controller fetches weather data from OpenWeatherMap API 
// based on the city name and unit (metric or imperial) provided in the request.
class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->query('city', 'Nairobi');
        $unit = $request->query('unit', 'metric'); // metric or imperial

        $apiKey = env('OPENWEATHER_API_KEY');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'units' => $unit,
            'appid' => $apiKey
        ]);

        return $response->json();
    }
}


