<x-layout title="Create Build">
    <form   class="flex flex-col justify-center items-center gap-y-3 text-neutral-500" method="POST" action="{{route('builds.store')}}" enctype="multipart/form-data">

                <div class="flex flex-col w-1/3 mb-1">
                    <label for="hero_id" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Your hero of choice</label>
                    <select id="hero_id" name="hero_id">
                        <option value="">Pick your hero...</option>
                        @foreach($heroes as $hero)
                            <option value="{{$hero->id}}">{{$hero->name}}</option>
                        @endforeach
                    </select>
                    @error("hero_id")
                    {{$message}}
                    @enderror
                </div>

        <div class="flex flex-col w-1/3 mb-1">
            <label for="name" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">What is your build called?</label>
            <input type="text" id="name" name="name" value="" class="border-2"/>
            @error("name")
            {{$message}}
            @enderror
        </div>
        <div class="flex flex-col w-1/3 mb-1">
            <label for="description" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Describe your build</label>
            <input type="text" id="description" name="description" class="border-2 h-40"/>
            @error("description")
            {{$message}}
            @enderror
        </div>

        <div class="flex flex-col w-1/3 mb-1">
            <label for="build_code" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Build Code</label>
            <input type="text" id="build_code" name="build_code" class="border-2"/>
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

        <div class="flex flex-col w-1/3 ga-x-2">
            <label for="tag_id" class="bg-[#242424] rounded mb-2 text-center text-neutral-200">Tags</label>

                <div>
                    @foreach($tags as $tag)
                        <input type="checkbox" name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}
                    @endforeach
                </div>
            @error("tag_id[]")
            {{$message}}
            @enderror
        </div>

        <div>
            <input type="hidden" name="created_at" value="{{ now() }}">
        </div>
        <div>
            <button type="submit" class="text-neutral-200 bg-[#363626] p-3 uppercase">Create Build</button>
        </div>
        @csrf
    </form>
</x-layout>
