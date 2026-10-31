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

    <table class="table w-full text-neutral-100 text-center">
        <thead>
            <tr class="bg-[#242424]">
                <th>Build</th>
                <th>User</th>
                <th>Hero</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
        @foreach($builds as $build)
            <tr class="bg-[#111111] text-neutral-400">
                <td>{{$build->name}}</td>
                <td>{{$build->user->name}}</td>
                <td>{{$build->hero->name}}</td>

                <td>
                <form action="{{ route('admin.activeBuild', ['build' => $build]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    @if($build->active == "1")
                        <button type="submit" class="py-1 px-3 rounded bg-[#663636] font-mono uppercase text-neutral-100">
                            Disable
                        </button>
                    @else
                        <button type="submit" class="py-1 px-3 rounded bg-[#366636] font-mono uppercase text-neutral-100">
                            Enable
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
