<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'fname', 'maiden_name', 'lname', 'email', 'image', 'password', 'designation', 'is_active','phone','type','status','status','request_status'];

    public function usercompany()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
    public function userdocument()
    {
        return $this->hasMany(UserDocument::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function booking(){
        return $this->hasMany(Booking::class,'customer_id');
    }

    public function assignRides(){
        return $this->hasMany(AssignRide::class,'chauffer_id');
    }

//credit details 
    public function creditCardDetail()
{
    return $this->hasOne(CreditCard::class, 'user_id', 'id');
}


}
