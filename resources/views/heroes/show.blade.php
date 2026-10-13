<x-layout title="{{$hero->name}}">
    <h1>{{$hero->name}}</h1>
    <p>Description: {{$hero->backstory}}</p>

    <p>Created at: {{$hero->created_at}}</p>
    <a href="{{route('builds.show', $hero)}}">Show Builds</a>
</x-layout>
