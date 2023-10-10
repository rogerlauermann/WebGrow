<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoolerData extends Model
{
    protected $table = 'cooler_data'; // Name of the table in the database

    protected $fillable = ['status', 'timestamp'];

    use HasFactory;
}
