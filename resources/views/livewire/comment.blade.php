<div>
    <form wire:submit.prevent="addComment">
        <div class="form-group">
            <label for="comment">Add Comment</label>
            <textarea class="form-control" wire:model="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    @foreach ($comments as $comment)
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $comment->body }}</p>
        </div>
    </div>
    @endforeach
</div>
