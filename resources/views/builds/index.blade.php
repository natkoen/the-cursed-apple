<x-layout title="Builds">


        <form class="flex flex-row justify-start gap-x-3" action="{{ route('builds.index') }}" method="GET">

            <select id="hero_id" name="hero_id">
                    <option value="">Sort by Hero...</option>
                @foreach($heroes as $hero)
                    <option value="{{$hero->id}}" @selected(request('hero' == $hero->id))>{{$hero->name}}</option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{request('search')}}" placeholder="Search build...">

            <a class="p-2 bg-[#363636] font-mono uppercase text-neutral-100" href="{{ route('builds.index') }}">Remove Filters</a>

            <button type="submit" class="p-2 bg-[#363636] font-mono uppercase text-neutral-100">Filter</button>
        </form>

        <div class="grid grid-cols-3">
        @foreach($builds as $build)
        <x-card>
            <div class="flex-1">
                <img src="{{Vite::asset($build->hero->image_url)}}" alt=""/>
            </div>

            <div class="flex flex-3 flex-col text-right">
                <h2 class="font-bold text-neutral-300 text-xl font-serif">{{$build->name}}</h2>
                <p class="flex-1 italic text-neutral-500">Build for {{$build->hero->name}}</p>
                <p class="text-neutral-600">Created at: {{$build->created_at}}</p>
                <a class="bg-[#242424] flex justify-center items-center font-bold text-neutral-200" href="{{ route('builds.show', $build)}}">View Details</a>
            </div>
        </x-card>
        @endforeach
        </div>

</x-layout>
