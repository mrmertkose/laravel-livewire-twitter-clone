<?php

namespace App\Models;

use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'user_id', 'id')->orderByDesc('created_at');;
    }

    public function favorite()
    {
        return $this->belongsToMany(Tweet::class, 'favorites', 'user_id', 'tweet_id')->withTimestamps()
            ->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->user()->id);
                }
            });
    }

    public function following($getId = null)
    {
        $id = $getId != null ? $getId : auth()->user()->id;
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id')->withTimestamps()
            ->where(function ($query)use ($id) {
                //if (auth()->check()) {

                    $query->where('follower_id', $id);
                //}
            });
    }

    public function followers($getId = null)
    {
        $id = $getId != null ? $getId : auth()->user()->id;
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')->withTimestamps()
            ->where(function ($query) use ($id) {
//                if (auth()->check()) {
                    $query->where('following_id', $id);
                //}
            });
    }

    public function sluggable()
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }


}
