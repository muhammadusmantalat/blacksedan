<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicledetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chauffeurVehicles() {
        return $this->belongsTo(Chauffeur::class, 'chauffers_id');
    }
}
