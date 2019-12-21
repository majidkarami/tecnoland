<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photos()
    {
      return $this->hasMany(Photo::class);
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function addresses()
    {
      return $this->hasMany(Address::class);
    }
    public function coupons()
    {
      return $this->belongsToMany(Coupon::class);
    }
    public function orders(){
      return $this->hasMany(Order::class);
    }
}
