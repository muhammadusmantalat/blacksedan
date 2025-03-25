<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'image',
        'number_plate',
        'base_price',
        'price_per_kilometer',
    ];

    public function bookings(){
        return $this->hasOne(Bookings::class , 'vehicle_id');
    }
}
