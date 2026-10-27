<x-layout title="Create Build">
    <form method="POST" action="{{route('builds.store')}}">
                <div>
                    <label for="hero_id">Hero</label>
                    <select id="hero_id" name="hero_id">
                        @foreach($heroes as $hero)
                            <option value="{{$hero->id}}">{{$hero->name}}</option>
                        @endforeach
                    </select>
                </div>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2"/>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="border-2"/>
        </div>

        <div>
            <label for="bcode">Build Code</label>
            <input type="text" id="build_code" name="build_code" class="border-2"/>
        </div>

        <div>
            <label for="image">Build Screenshot</label>
            <input type="text" id="build_image" name="build_image" class="border-2"/>
        </div>

        <div>
            <label for="tag_id">Tags</label>

                @foreach($tags as $tag)
                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}</input>
                @endforeach

        </div>

        <div>
            <input type="hidden" name="created_at" value="{{ now() }}">
        </div>
        <div>
            <button type="submit" class="border-2">Create Build</button>
        </div>
        @csrf
    </form>
</x-layout>
