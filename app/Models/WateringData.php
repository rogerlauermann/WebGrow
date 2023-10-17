<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WateringData extends Model
{
    protected $table = 'watering_data'; // Name of the table in the database

    protected $fillable = ['time', 'timestamp'];

    use HasFactory;
}
