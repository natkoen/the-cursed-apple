<div>
    <ul>
        <li>
            <x-nav-link href="{{ route('admin.builds') }}" :active="request()->routeIs('admin.builds')">
                Builds
            </x-nav-link>
        </li>

        <li>
            <x-nav-link href="{{ route('admin.heroes') }}" :active="request()->routeIs('admin.heroes')">
                Heroes
            </x-nav-link>
        </li>


    </ul>

</div>
