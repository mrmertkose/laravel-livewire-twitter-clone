<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileInfo extends Component
{
    protected $listeners = ['new-tweet' => '$refresh'];

    public $user;

    public function render()
    {
        return view('livewire.profile-info');
    }
}
