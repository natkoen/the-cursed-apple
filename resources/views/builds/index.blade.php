<x-layout title="Builds">


        <form action="{{ route('builds.index') }}" method="GET">
            <select id="hero_id" name="hero_id">
                @foreach($heroes as $hero)
                    <option value="{{$hero->id}}" @selected(request('hero' == $hero->id))>{{$hero->name}}</option>
                @endforeach
            </select>

{{--            <select id="tag_id" name="tag_id">--}}
{{--                @foreach($tags as $tag)--}}
{{--                    <option value="{{$tag->id}}" @selected(request('tag' == $tag->id))> {{$tag->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}

            <a href="{{ route('builds.index') }}">Remove Filters</a>
            <button type="submit">Filter</button>
        </form>


        @foreach($builds as $build)
        <x-card style="display: flex; flex-direction: row; justify-content: center; align-content: center">
            <h2>{{$build->name}}</h2>
            <p>{{$build->hero->name}}</p>
            <img src=" " alt=""/>
            <p>Created at: {{$build->created_at}}</p>
            <a href="{{ route('builds.show', $build)}}">View Details</a>
        </x-card>
        @endforeach

</x-layout>
