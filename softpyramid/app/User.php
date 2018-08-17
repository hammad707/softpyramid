<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
	
	
	
	 /**
     * One to many relation with questionair table
     * @author Hammad Ali <hammad.ali.707@gmail.com>
     */
    public function questionairs()
    {
        return $this->hasMany('App\Questionair', 'id');
    }
}
