<?php

namespace App\Http\Controllers;

use App\Models\TemperatureData;
use App\Models\HumidityData;
use Illuminate\Http\Request;
use App\Charts\DHTChart;

class DHTController extends Controller
{
    public function index(Request $request)
    {
        $t = TemperatureData::pluck('value','timestamp');
        $h = HumidityData::pluck('value','timestamp');

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
