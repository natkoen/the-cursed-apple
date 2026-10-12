<x-layout title="Builds">
    <x-card>
        @foreach($heroes as $hero)
            <p>{{$hero}}</p>
        @endforeach
    </x-card>
</x-layout>
