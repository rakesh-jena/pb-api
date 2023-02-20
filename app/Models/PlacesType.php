<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacesType extends Model
{
    use HasFactory;

    protected $table = 'places_type';
    protected $fillable = [
        'type',
    ];
}
