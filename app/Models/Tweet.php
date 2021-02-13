<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'post'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function getFeed($perPage)
    {
        $id = Auth::id();
        return Tweet::whereIn('user_id', function($query) use($id)
        {
            $query->select('following_id')
                ->from('followers')
                ->where('follower_id', $id);
        })->orWhere('user_id', $id)->latest()->paginate($perPage);
    }

    public function favorite()
    {
            $belongs = $this->belongsToMany(User::class, 'favorites', 'tweet_id', 'user_id')->withTimestamps();
            $this->counter = $belongs->count();
            $this->data= $belongs->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->user()->id);
                }
            });
            return $this;
    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'tweet_id');
    }



}
