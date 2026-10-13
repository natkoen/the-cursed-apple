<x-layout title="Builds for {{$build->name}}">
    <h1>{{$build->name}}</h1>
    <p>Description: {{$build->description}}</p>
    <p>Code: {{$build->build_code}}</p>
    <p>Created at: {{$build->created_at}}</p>
</x-layout>
