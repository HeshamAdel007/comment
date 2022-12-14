<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::all(),
        ]);
    }
}
