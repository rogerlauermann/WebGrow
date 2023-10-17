<?php

namespace App\Http\Controllers;

use App\Models\SoilData;
use Illuminate\Http\Request;

class SoilDataController extends Controller
{
    // Handle incoming data and distribute it to the appropriate tables
    public function store(Request $request)
    {
        $data = $request->json()->all();

        // Validate the incoming data based on your requirements
        $validatedData = $this->validateData($data);

        // Distribute and store the data in respective tables
        $this->storeSoilData($validatedData['sensor01'], $validatedData['sensor02'], $validatedData['sensor03'], $data['timestamp']);

        return response()->json(['message' => 'Data stored successfully'], 201);
    }

    // Validate the incoming data
    protected function validateData($data)
    {
        return request()->validate([
            'sensor01' => 'required|in:0,1',
            'sensor02' => 'required|in:0,1',
            'sensor03' => 'required|in:0,1',
            'timestamp' => 'required|date_format:Y-m-d H:i:s', // Add the timestamp validation rule
        ]);
    }

    protected function storeSoilData($sensor01, $sensor02, $sensor03, $timestamp)
    {
        SoilData::create([
            'sensor01' => $sensor01,
            'sensor02' => $sensor02,
            'sensor03' => $sensor03,
            'timestamp' => $timestamp,
        ]);
    }

}
