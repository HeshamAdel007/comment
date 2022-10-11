<div>
    <form wire:submit.prevent="addComment">
        <div class="form-group">
            <label for="comment">Add Comment</label>
            <textarea class="form-control" wire:model="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <div class="comment">
        @foreach ($comments as $comment)
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $comment->body }}</p>
                {{-- <h3> {{ count($comment->replies) }}</h3> --}}
                <div class="d-flex align-items-center">
                    @if(count($comment->replies))
                    @foreach ($comment->replies as $item)
                    <h3> Replay:- <b>{{ $item->body }}</b></h3>
                    @endforeach
                    @else
                    <button type="button" wire:click="replayForm({{ $comment->id }})"
                        class="btn btn-success">Replay</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <hr>
        <hr>
        @if ($showReplayForm)
        <div>
            <div class="form-group">
                <label for="comment">Add replay</label>
                <textarea class="form-control" wire:model="reply"></textarea>
            </div>
            <div wire:click="replay" class="btn btn-primary">replay</button>
            </div>
        </div>
        @endif
    </div>

</div>
