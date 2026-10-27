<x-layout>
    <form method="POST" action="{{route('builds.update', $build)}}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2" value="{{$build->name}}"/>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="border-2" value="{{$build->description}}"/>
        </div>

        <div>
            <label for="bcode">Build Code</label>
            <input type="text" id="build_code" name="build_code" class="border-2" value="{{$build->build_code}}"/>
        </div>

        <div>
            <label for="image">Build Screenshot</label>
            <input type="text" id="build_image" name="build_image" class="border-2" value="{{$build->build_image}}"/>
        </div>
        <div>
            <input type="hidden" id="updated_at" name="updated_at" value="{{ now() }}">
        </div>
        <div>
            <label for="tag_id">Tags</label>

            @foreach($tags as $tag)
                <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}</input>
            @endforeach

        </div>
        <div>
            <button type="submit" class="border-2">Update Build</button>
        </div>
    </form>
</x-layout>
