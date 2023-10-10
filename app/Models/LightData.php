<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightData extends Model
{
    protected $table = 'light_data'; // Name of the table in the database

    protected $fillable = ['status', 'timestamp'];

    use HasFactory;
}
