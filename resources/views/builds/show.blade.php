<x-layout title="Builds for {{$build->name}}">
    <x-card>
        <h1>{{$build->name}}</h1>
        <p>Description: {{$build->description}}</p>
        <p>Code: {{$build->build_code}}</p>
        <p>Tags:
        @forelse ($build->tags as $tag)
        <span> {{$tag->name}}</span>
            @empty
                <span>No tags</span>
            @endforelse
        </p>
        <p>This build was created by: {{$build->user->name}}</p>
        <p>Created at: {{$build->created_at}}</p>
        <img src="{{Vite::asset($build->hero->image_url)}}" alt="">
        <img src="{{asset('storage/' .$build->build_image)}}" alt="{{$build->name}}">
        <p>Last updated at: {{$build->updated_at}}</p>
        @if(auth()->id() === $build->user_id)
            <a href="{{route('builds.edit', $build)}}">Edit Build</a>
            <form action="{{route('builds.destroy', $build)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Build</button>
            </form>
        @endif
    </x-card>
</x-layout>
