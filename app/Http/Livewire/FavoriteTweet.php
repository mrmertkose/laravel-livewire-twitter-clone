<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteTweet extends Component
{
    protected $listeners = ['unFavorites' => 'revFavorites','favorites' => 'favorites'];

    public $userId,$tweets,$tweet;

    public function mount($item)
    {
        $this->tweets = $item;
        $this->userId = Auth::id();
        $this->tweet = Tweet::where('id', $item->id)->first();
    }

    public function favorites()
    {
        $this->tweet->favoriteUser()->attach($this->userId);
        $this->emit('new-tweet');
    }

    public function revFavorites()
    {
        $this->tweet->favoriteUser()->detach($this->userId);
        $this->emit('new-tweet');
    }

    public function render()
    {
        return view('livewire.favorite-tweet');
    }
}
