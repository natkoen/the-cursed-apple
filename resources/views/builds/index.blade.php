<x-layout title="Builds">

        @foreach($builds as $build)
        <x-card>
            <h2>{{$build->name}}</h2>
            <p>{{$build->hero->name}}</p>
            <p>Created at: {{$build->created_at}}</p>
            <a href="{{ route('builds.show', $build)}}">View Details</a>
        </x-card>
        @endforeach

</x-layout>
