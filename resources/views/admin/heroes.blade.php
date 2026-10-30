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
                <th>Hero</th>
                <th>Added at:</th>
            </tr>
            </thead>

            <tbody>
            @foreach($heroes as $hero)
                <tr>
                    <th>{{$hero->name}}</th>
                    <th>{{$hero->created_at->toDateString()}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
