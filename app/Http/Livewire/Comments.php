<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Livewire\Livewire;

class Comments extends Component
{
    public $body;
    public $post;
    public $comments = [];

    public function mount($post)
    {
        $this->post = Post::find($post->id);
        $this->comments = $this->post->comments;
    }

    protected $rules = [
        'body' => 'required',
    ];

    public function addComment()
    {
        $newComment = new Comment([
            'body' => $this->body,
            'commentable_id' => $this->post->id,
            'commentable_type' => "App\Models\Post",
        ]);
        $newComment->save();
        $this->comments->prepend($newComment);
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
