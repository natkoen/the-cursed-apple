<x-layout title="{{$hero->name}}">
    <div class="flex flex-row w-full justify-between font-serif m-2">
        <div class="flex flex-col gap-y-1">
            <h1 class="font-bold italic text-neutral-300 text-3xl">{{$hero->name}}</h1>
            <img src="{{Vite::asset($hero->image_url)}}" alt="">
            <a class="p-2 bg-[#363636] font-mono uppercase text-neutral-100" href="{{route('builds.show', $hero)}}">Show Builds</a>

        </div>

        <div>
            Description: {{$hero->backstory}}
        </div>
    </div>
</x-layout>
