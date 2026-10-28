<x-layout title="Heroes">
    @foreach($heroes as $hero)
    <x-card>


            <h2>{{$hero->name}}</h2>
            <p>Created at: {{$hero->created_at}}</p>
        <img src="{{Vite::asset('images/heroes/')}}" alt="{{$hero->name}}">
            <a href="{{ route('heroes.show', $hero)}}">View Details</a>
    </x-card>
    @endforeach
</x-layout>
