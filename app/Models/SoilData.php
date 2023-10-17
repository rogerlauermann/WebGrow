<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoilData extends Model
{
    protected $table = 'soil_data'; // Name of the table in the database

    protected $fillable = ['sensor01', 'sensor02', 'sensor03', 'timestamp'];

    use HasFactory;
}
