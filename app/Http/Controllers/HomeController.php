<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the API key from the application's configuration
        $apiKey = config('services.meteoserver.api_key');
        
        // Fetch the 7-day weather forecast from the Meteoserver API
        $forecastResponse = Http::get('https://data.meteoserver.nl/api/dagverwachting.php', [
            'key' => $apiKey,
            'locatie' => 'Sneek',
        ]);

        $forecast = $forecastResponse->json();

        // Check if the response contains any data
        $forecastData = [];
        if (!empty($forecast['data'])) {
            $forecastData = array_map(function ($result) {
                return [
                    'day' => $result['dag'],
                    'min_temp' => $result['min_temp'],
                    'max_temp' => $result['max_temp'],
                    'condition' => $result['toestand'],
                ];
            }, $forecast['data']);
        }

        // Return the home view with the 7-day forecast data
        return view('home', ['sevenDayForecast' => $forecastData]);
    }
}