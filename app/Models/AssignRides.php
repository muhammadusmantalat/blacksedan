<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignRides extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function chuaffers(){
        return $this->belongsTo(User::class,'chauffer_id','id');
    }
    public function bookings(){
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
}
