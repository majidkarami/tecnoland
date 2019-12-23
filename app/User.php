<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static findOrFail($id)
 * @method static paginate(int $int)
 * @property array|string|null last_name
 * @property array|string|null national_code
 * @property array|string|null name
 * @property array|string|null birthday
 * @property array|string|null bank_number
 * @property array|string|null email
 * @property string password
 * @property string remember_token
 * @property array|string|null phone
 * @property array|string|null gender
 */
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
