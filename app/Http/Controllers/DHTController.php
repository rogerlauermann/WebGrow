<?php

namespace App\Http\Controllers;

use App\Models\TemperatureData;
use App\Models\HumidityData;
use Illuminate\Http\Request;
use App\Charts\DHTChart;
use Carbon\Carbon;

class DHTController extends Controller
{
    public function index(Request $request)
    {
        // Get the latest timestamp from TemperatureData
        $latestTemperatureTimestamp = TemperatureData::latest('timestamp')->value('timestamp');

        // Calculate the timestamp for 24 hours ago
        $last24Hours = Carbon::parse($latestTemperatureTimestamp)->subHours(1);

        // Fetch the data from the last 24 hours for TemperatureData and HumidityData
        $t = TemperatureData::where('timestamp', '>=', $last24Hours)
            ->pluck('value', 'timestamp');

        $h = HumidityData::where('timestamp', '>=', $last24Hours)
            ->pluck('value', 'timestamp');

        $chart = new DHTChart;

        $chart->labels($t->keys());

        $chart->dataset('Temperature', 'line', $t->values())
            ->backgroundColor('rgba(0, 0, 255, 0)')
            ->color('green');

        $chart->dataset('Humidity', 'line', $h->values())
            ->backgroundColor('rgba(0, 0, 255, 0)')
            ->color('blue');

        return view('DHT', compact('chart'));
    }
}
