<x-layout title="Builds">
    <x-card>
        @foreach($builds as $build)

            <h2>{{$build->name}}</h2>
            <p>Created at: {{$build->created_at}}</p>
            <a href="{{ route('builds.show', $build)}}">View Details</a>
        @endforeach
    </x-card>
</x-layout>
