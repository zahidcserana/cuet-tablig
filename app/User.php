<?php

namespace App;

//use App\Model\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','picture','provider','provider_id','code'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

   /* public function message()
    {
        return $this->hasMany('Messgae');
    }*/
    public function message()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

}
