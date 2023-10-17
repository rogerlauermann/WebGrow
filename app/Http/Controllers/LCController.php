<?php

namespace App\Http\Controllers;

use App\Models\CoolerData;
use App\Models\LightData;
use Illuminate\Http\Request;
use App\Charts\DHTChart;
use Carbon\Carbon;

class LCController extends Controller
{
    public function index(Request $request)
    {
        $dataRequest = $request->all();

        $oldDateIni = $request->input('date_ini');
        $oldDateEnd = $request->input('date_end');

        $dataEnd = $dataRequest['date_end'] ?? LightData::latest('timestamp')->value('timestamp');

        $dataIni = $dataRequest['date_ini'] ?? Carbon::parse($dataEnd)->subHours(1)->toDateTimeString();

        $l = LightData::where('timestamp', '>=', Carbon::parse($dataIni))
            ->where('timestamp', '<=', Carbon::parse($dataEnd))
            ->pluck('status', 'timestamp');

        $c = CoolerData::where('timestamp', '>=', Carbon::parse($dataIni))
            ->where('timestamp', '<=', Carbon::parse($dataEnd))
            ->pluck('status', 'timestamp');

        $chart = new DHTChart;

        $chart->labels($l->keys());

        $chart->dataset('Light', 'line', $l->values())
            ->backgroundColor('rgba(65, 105, 225, 0.2)')
            ->color('rgba(65, 105, 225)');

        $chart->dataset('Cooler', 'line', $c->values())
            ->backgroundColor('rgba(148, 0, 211, 0.2)')
            ->color('rgba(148, 0, 211)');

        return view('LC', compact('chart', 'oldDateIni', 'oldDateEnd'));
    }
}
