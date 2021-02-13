<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Events extends Component
{
    protected $listeners = ['new-tweet' => '$refresh'];

    public function render()
    {
        $hashtags = Tag::orderByDesc('count')
            ->select(DB::raw('name,count(*) as count'))
            ->groupBy('name')
            ->limit(5)
            ->get();
        return view('livewire.events', ['hashtags' => $hashtags]);
    }
}
