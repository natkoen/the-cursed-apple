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
            <tr>
                <th>Hero</th>
                <th>Added at:</th>
            </tr>
            </thead>

            <tbody>
            @foreach($heroes as $hero)
                <tr class="bg-[#111111] text-neutral-400">
                    <td>{{$hero->name}}</td>
                    <td>{{$hero->created_at->toDateString()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
