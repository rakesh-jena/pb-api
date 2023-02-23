<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'placeType',
        'area',
        'city',
        'state',
        'pin',
        'address',
        'latitude',
        'longitude',
        'vehicleType',
        'capacity',
        'pricePerHour',
    ];
}
