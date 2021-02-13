<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileTweet extends Component
{
    public $user;

    protected $listeners = [
        'new-tweet' => '$refresh',
        'load-more' => 'loadMore',
        'unFavorites' => 'unFavorites',
        'favorites' => 'favorites'
    ];

    public $perPage = 8;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function favorites($tweetId)
    {
        $tweet = Tweet::find($tweetId);
        $tweet->favorite()->data->attach(Auth::id());
    }

    public function unFavorites(Tweet $tweet)
    {
        $tweet->favorite()->data->detach(Auth::id());
    }

    public function render()
    {
        return view('livewire.profile-tweet');
    }
}
