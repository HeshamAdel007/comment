<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Livewire\Livewire;

class Comments extends Component
{
    public $body;
    public $commentId;
    public $post;
    public $reply;
    public $showReplayForm = false;
    public $replay = [];
    public $comments = [];

    public function mount($post)
    {
        $this->post = Post::find($post->id);
        $this->comments = $this->post->comments;
    }

    public function replayForm($id)
    {
        $this->showReplayForm = !$this->showReplayForm;
        $this->commentId = $id;
    }

    public function addComment()
    {
        $this->validate([
            'body' => 'required'
        ]);
        $newComment = new Comment([
            'body' => $this->body,
            'commentable_id' => $this->post->id,
            'commentable_type' => "App\Models\Post",
        ]);
        $newComment->save();
        $this->comments->prepend($newComment);
        $this->body = '';
    }
    public function replay()
    {
        $this->validate([
            'reply' => 'required'
        ]);
        $newReplay = new Comment([
            'body' => $this->reply,
            'parent_id' => $this->commentId,
            'commentable_id' => $this->post->id,
            'commentable_type' => "App\Models\Post",
        ]);
        $newReplay->save();
        $this->showReplayForm = false;
        $this->reply = '';
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
