<x-layout>
    <form class="flex flex-col justify-center items-center gap-y-3 text-neutral-500" method="POST" method="POST" action="{{route('builds.update', $build)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-col w-1/3 mb-1">
            <label for="name" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Name</label>
            <input type="text" id="name" name="name" class="border-2" value="{{$build->name}}"/>
            @error("name")
            {{$message}}
            @enderror
        </div>

        <div class="flex flex-col w-1/3 mb-1">
            <label for="description" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Description</label>
            <input type="text" id="description" name="description" class="border-2 h-40" value="{{$build->description}}"/>
            @error("description")
            {{$message}}
            @enderror
        </div>

        <div class="flex flex-col w-1/3 mb-1">
            <label for="build_code" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Build Code</label>
            <input type="text" id="build_code" name="build_code" class="border-2" value="{{$build->build_code}}"/>
            @error("build_code")
            {{$message}}
            @enderror
        </div>

        <div class="flex flex-col w-1/3 mb-1">
            <label for="build_image" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Build Screenshot</label>
            <input type="file" id="build_image" name="build_image" class="border-2"/>
            @error("build_image")
            {{$message}}
            @enderror
        </div>
        <div>
            <input type="hidden" id="updated_at" name="updated_at" value="{{ now() }}">
        </div>
        <div class="flex flex-col w-1/3 ga-x-2">
            <label for="tag_id" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Tags</label>

            <div>
                @foreach($tags as $tag)
                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}
                @endforeach
                    @error("tag_id[]")
                    {{$message}}
                    @enderror
            </div>

        </div>
        <div>
            <button type="submit" class="text-neutral-200 bg-[#363626] p-3 uppercase">Update Build</button>
        </div>
    </form>
</x-layout>
