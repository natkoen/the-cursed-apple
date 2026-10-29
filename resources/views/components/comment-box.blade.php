<x-card>
    <form action="{{ route('builds.comments.store', ['build' => $build])}}" method="POST">

    <div>
            <textarea name="comment" id="comment"></textarea>
    </div>

        <div>
            <button type="submit"> Post Comment</button>
        </div>

        @csrf
    </form>
</x-card>
@foreach($comments as $comment)

    <x-card>
                {{$comment->user->name}}
                {{$comment->comment}}
                {{$comment->created_at}}

        @if(auth()->id() === $comment->user->id || Auth::user()->role === "1")
            <form action="{{ route('builds.comments.destroy', ['build' => $build,'comment' => $comment]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Comment</button>
            </form>
        @endif
    </x-card>

@endforeach
