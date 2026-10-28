<x-layout title="Create Build">
    <form method="POST" action="{{route('builds.store')}}" enctype="multipart/form-data">
                <div>
                    <label for="hero_id">Hero</label>
                    <select id="hero_id" name="hero_id">
                        @foreach($heroes as $hero)
                            <option value="{{$hero->id}}">{{$hero->name}}</option>
                        @endforeach
                    </select>
                    @error("hero_id")
                    {{$message}}
                    @enderror
                </div>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="" class="border-2"/>
            @error("name")
            {{$message}}
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="border-2"/>
            @error("description")
            {{$message}}
            @enderror
        </div>

        <div>
            <label for="build_code">Build Code</label>
            <input type="text" id="build_code" name="build_code" class="border-2"/>
            @error("build_code")
            {{$message}}
            @enderror
        </div>

        <div>
            <label for="build_image">Build Screenshot</label>
            <input type="file" id="build_image" name="build_image" class="border-2"/>
            @error("build_image")
            {{$message}}
            @enderror
        </div>

        <div>
            <label for="tag_id">Tags</label>

                @foreach($tags as $tag)
                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}
                @endforeach
            @error("tag_id[]")
            {{$message}}
            @enderror
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
