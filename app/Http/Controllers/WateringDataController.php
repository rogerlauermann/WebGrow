<?php

namespace App\Http\Controllers;

use App\Models\WateringData;
use Illuminate\Http\Request;

class WateringDataController extends Controller
{
    // Handle incoming data and distribute it to the appropriate tables
    public function store(Request $request)
    {
        $data = $request->json()->all();

        // Validate the incoming data based on your requirements
        $validatedData = $this->validateData($data);

        // Distribute and store the data in respective tables
        $this->storeWateringData($validatedData['time'], $data['timestamp']);

        return response()->json(['message' => 'Data stored successfully'], 201);
    }

    // Validate the incoming data
    protected function validateData($data)
    {
        return request()->validate([
            'time' => 'required|numeric',
            'timestamp' => 'required|date_format:Y-m-d H:i:s', // Add the timestamp validation rule
        ]);
    }

    protected function storeWateringData($time, $timestamp)
    {
        WateringData::create([
            'time' => $time,
            'timestamp' => $timestamp,
        ]);
    }

}
