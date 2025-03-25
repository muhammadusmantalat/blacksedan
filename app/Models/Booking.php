<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function assignRides(){
        return $this->hasMany(AssignRide::class,'booking_id');
    }
}