<div class="card">
    <div class="card-header">
        {{ $post->title }}
    </div>
    <div class="card-body">

        <p class="card-text">{{ $post->content }}</p>
    </div>
</div>

<livewire:comments :post="$post">
