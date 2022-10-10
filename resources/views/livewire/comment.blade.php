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
        @if(count($comment->replies))
        <div class="d-flex align-items-center">

            @foreach ($comment->replies as $item)
            <h3> Replay:- <b>{{ $item->body }}</b></h3>
            @endforeach
        </div>
        @else
        <div>
            <div class="form-group">
                <textarea class="form-control" wire:model="body"></textarea>
            </div>
            <div wire:click="replay({{$comment->id }})" class="btn btn-primary">replay</button>
                </form>
            </div>
        </div>
        @endif
    </div>
    @endforeach
