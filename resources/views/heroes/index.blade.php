<x-layout title="Heroes">
    <div class="grid grid-cols-8 text-neutral-100 text-center">
        @foreach($heroes as $hero)
            <x-card>
                    <div class="flex flex-col justify-center items-center w-full">

                        <h2 class="font-serif text-xl uppercase mb-1 italic">{{$hero->name}}</h2>

                        <a href="{{ route('heroes.show', $hero)}}">
                            <img class="object-contain" src="{{Vite::asset($hero->image_url)}}" alt="{{$hero->name}}">
                        </a>
                    </div>
            </x-card>
        @endforeach
    </div>
</x-layout>
