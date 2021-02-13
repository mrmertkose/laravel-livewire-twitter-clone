<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class People extends Component
{

    protected $listeners = ['unfollow' => 'unfollow','follow' => 'follow'];

    public function follow($id)
    {
        $user = User::where('id', Auth::id())->first();
        $user->following()->attach($id);
        $this->emit('new-people');
    }

    public function unfollow($id)
    {
        $user = User::where('id', Auth::id())->first();
        $user->following()->detach($id);
        $this->emit('new-people');
    }

    public function render()
    {
        $users = User::query()
            ->where('id','!=',Auth::id())
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return view('livewire.people',['users' => $users]);
    }
}
