<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\DHTChart;
use App\Models\CoolerData;
use App\Models\LightData;

class LCController extends Controller
{
    public function index(Request $request)
    {
        $l = LightData::pluck('status','timestamp');
        $c = CoolerData::pluck('status','timestamp');

        $chart = new DHTChart;

        $chart->labels($l->keys());

        $chart->dataset('Light', 'bar', $l->values())
        ->backgroundColor('rgba(65,105,225,0.2)')
        ->color('rgba(65,105,225)');

        $chart->dataset('Cooler', 'bar', $c->values())
        ->backgroundColor('rgba(148,0,211,0.2)')
        ->color('rgba(148,0,211)');

        return view('LC', compact('chart'));
    }
}
