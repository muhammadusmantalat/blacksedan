<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chauffer extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    // Default values for status and type
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($chauffeur) {
            $chauffeur->status = $chauffeur->status ?? 'registered';
            $chauffeur->type = $chauffeur->type ?? 'chauffeur';
        });
    }

    public function bookings(){
        $this->belongsTo(Booking::class,'chauffer_id','id');
    }

    public function vehicledetails()
    {
        return $this->hasOne(Vehicledetail::class, 'chauffers_id', 'id');
    }
}
