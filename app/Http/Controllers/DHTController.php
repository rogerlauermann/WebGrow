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
        $dataRequest = $request->all();

        $oldDateIni = $request->input('date_ini');
        $oldDateEnd = $request->input('date_end');

        $dataEnd = $dataRequest['date_end'] ?? TemperatureData::latest('timestamp')->value('timestamp');

        $dataIni = $dataRequest['date_ini'] ?? Carbon::parse($dataEnd)->subHours(1)->toDateTimeString();

        $t = TemperatureData::where('timestamp', '>=', Carbon::parse($dataIni))
        ->where('timestamp', '<=', Carbon::parse($dataEnd))
            ->pluck('value', 'timestamp');

        $h = HumidityData::where('timestamp', '>=', Carbon::parse($dataIni))
        ->where('timestamp', '<=', Carbon::parse($dataEnd))
            ->pluck('value', 'timestamp');

        $chart = new DHTChart;

        $chart->labels($t->keys());

        $chart->dataset('Temperature', 'line', $t->values())
            ->backgroundColor('rgba(0, 0, 255, 0)')
            ->color('green');

        $chart->dataset('Humidity', 'line', $h->values())
            ->backgroundColor('rgba(0, 0, 255, 0)')
            ->color('blue');

        return view('DHT', compact('chart', 'oldDateIni', 'oldDateEnd'));
    }
}
