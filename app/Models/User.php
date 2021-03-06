<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *d
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        // 順番は関係あるのかな？
        'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        $this->hasMany('App\Models\Post');
        // 小文字だとどうなるか実験
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
    
}
