<x-card>
    @auth
    <form class="flex flex-col w-full gap-y-2" action="{{ route('builds.comments.store', ['build' => $build])}}" method="POST">
        <div>
                <textarea name="comment" id="comment" rows="3" class="bg-neutral-500 opacity-5 border rounded-sm block w-full p-3.5 shadow-xs placeholder:text-body"></textarea>
        </div>

        <div>
            <button type="submit" class="text-neutral-200 bg-[#363626] p-3 uppercase">Post Comment</button>
        </div>
        @csrf
    </form>
    @elseauth
        <div>
        <h2>You have to be logged in to leave a comment.</h2>
        </div>
    @endauth
</x-card>
@foreach($comments as $comment)

    <x-card>
        <div class="flex flex-col text-neutral-400">
            <div class="text-xl text-neutral-100 font-serif font-bold italic">
                {{$comment->user->name}}
            </div>
            <div class="text-sm font-mono mb-2">
                {{$comment->comment}}
            </div>
            <div class="text-xs">
                {{$comment->created_at}}
            </div>


            @if(auth()->id() == $comment->user->id || auth()->user()->role() == "1")
                <form action="{{ route('builds.comments.destroy', ['build' => $build,'comment' => $comment]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 bg-[#662424] font-mono upperase text-neutral-100">Delete Comment</button>
                </form>
            @endif
        </div>
    </x-card>

@endforeach
