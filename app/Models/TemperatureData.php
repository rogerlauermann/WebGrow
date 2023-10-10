<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureData extends Model
{
    protected $table = 'temperature_data'; // Name of the table in the database

    protected $fillable = ['value', 'timestamp'];

    use HasFactory;
}
