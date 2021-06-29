<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// ↑？？
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments():HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
    // :belongsTo入れてみる
    public function favorites():HasMany
    {
        return $this->hasMany('App\Models\Favorite');
    }
    // public function favorites()
    // {
    //     return $this->hasOne('App\Models_');
    // }
    public function isFavorited():bool
    {
        return Favorite::where('user_id', Auth::user()->id)->first()
            ? true
            :false;
    }


}
