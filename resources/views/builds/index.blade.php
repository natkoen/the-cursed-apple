<x-layout title="Builds">


        <form action="{{ route('builds.index') }}" method="GET">
            <select id="hero_id" name="hero_id">
                <option value="">Select a Hero...</option>
                @foreach($heroes as $hero)
                    <option value="{{$hero->id}}" @selected(request('hero' == $hero->id))>{{$hero->name}}</option>
                @endforeach
            </select>

            <button type="submit">Filter</button>
        </form>


        @foreach($builds as $build)
        <x-card style="display: flex; flex-direction: row; justify-content: center; align-content: center">
            <h2>{{$build->name}}</h2>
            <p>{{$build->hero->name}}</p>
            <img src="" alt=""/>
            <p>Created at: {{$build->created_at}}</p>
            <a href="{{ route('builds.show', $build)}}">View Details</a>
        </x-card>
        @endforeach

</x-layout>
