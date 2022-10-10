<div>
    <ul style="padding: 0.5rem 1rem;">
        @foreach ($posts as $post)
        <li>
            <a href="{{ route('post.show', ['id'=>$post->id]) }}" style="text-decoration: none;">{{ $post->title }}</a>
        </li>
        @endforeach
    </ul>
</div>
