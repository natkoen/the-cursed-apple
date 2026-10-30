<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div style="display: flex; flex-direction: row; margin: 2vw; gap: 3vw;">

    <x-left-sidebar>
        $slot
    </x-left-sidebar>

    <table>
        <thead>
            <tr>
                <th>Build</th>
                <th>User</th>
                <th>Hero</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
        @foreach($builds as $build)
            <tr>
                <td>{{$build->name}}</td>
                <td>{{$build->user->name}}</td>
                <td>{{$build->hero->name}}</td>

                <td>
                <form action="{{ route('admin.activeBuild', ['build' => $build]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    @if($build->active == "1")
                        <button type="submit">
                            Enable
                        </button>
                    @else
                        <button type="submit">
                            Disable
                        </button>
                    @endif
                </form>

                </td>

                <td>{{$build->created_at->toDateString()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</x-layout>
