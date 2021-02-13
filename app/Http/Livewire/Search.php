<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $query,$users;

    public function mount()
    {
        $this->resetValues();
    }

    public function resetValues()
    {
        $this->query = '';
        $this->users = [];
    }

    public function updatedQuery()
    {
        //$this->users = User::where('name','like','%'.$this->query.'%')->get();
        $search = $this->query;
        $this->users = User::where('name','like','%'.$search.'%')
            ->where('tags', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->get();

    }

    public function render()
    {
        return view('livewire.search');
    }
}
