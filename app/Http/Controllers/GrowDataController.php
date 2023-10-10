<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoolerData;
use App\Models\LightData;
use App\Models\TemperatureData;
use App\Models\HumidityData;

class GrowDataController extends Controller
{
    // Handle incoming data and distribute it to the appropriate tables
    public function store(Request $request)
    {
        $data = $request->json()->all();

        // Validate the incoming data based on your requirements
        $validatedData = $this->validateData($data);

        // Distribute and store the data in respective tables
        $this->storeLightData($validatedData['light_status'], $data['timestamp']);
        $this->storeTemperatureData($validatedData['temperature'], $data['timestamp']);
        $this->storeHumidityData($validatedData['humidity'], $data['timestamp']);
        $this->storeCoolerData($validatedData['cooler_status'], $data['timestamp']);

        return response()->json(['message' => 'Data stored successfully'], 201);
    }

    // Validate the incoming data
    protected function validateData($data)
    {
        return request()->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light_status' => 'required|in:0,1',
            'cooler_status' => 'required|in:0,1',
            'timestamp' => 'required|date_format:Y-m-d H:i:s', // Add the timestamp validation rule
        ]);
    }

    protected function storeLightData($status, $timestamp)
    {
        LightData::create([
            'status' => $status,
            'timestamp' => $timestamp,
        ]);
    }

    protected function storeCoolerData($status, $timestamp)
    {
        CoolerData::create([
            'status' => $status,
            'timestamp' => $timestamp,
        ]);
    }

    protected function storeTemperatureData($temperature, $timestamp)
    {
        TemperatureData::create([
            'value' => $temperature,
            'timestamp' => $timestamp,
        ]);
    }

    protected function storeHumidityData($humidity, $timestamp)
    {
        HumidityData::create([
            'value' => $humidity,
            'timestamp' => $timestamp,
        ]);
    }

}
