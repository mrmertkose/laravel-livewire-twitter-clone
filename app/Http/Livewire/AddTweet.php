<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTweet extends Component
{
    use WithFileUploads;

    public $post, $image;

    protected $rules = [
        'post' => 'required|max:200',
    ];

    public function store()
    {
        $this->validate();
        $tweet = new Tweet;
        $tweet->user_id = Auth::id();
        $tweet->post = $this->post;
        if ($this->image != null) {
            $this->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images/tweet', $imageName, 'public');
            $tweet->image = $imageName;
        }
        $tweet->save();
        if (!empty($values = hashtagDb($this->post))){
            foreach ($values as $item)
                $tweet->tags()->create([
                    'name' => $item,
                    'tweet_id' => $tweet->id
                ]);
        }

        $this->emit('new-tweet');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-tweet');
    }
}
