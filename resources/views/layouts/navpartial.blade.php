<nav>
    <x-navlink href="{{route('home')}}"    :active="request()->routeIs('home')">
        Home
    </x-navlink>

    <x-navlink href="{{route('builds')}}"   :active="request()->routeIs('builds')">
        Builds
    </x-navlink>

    <x-navlink href="{{route('contact')}}" :active="request()->routeIs('contact')">
        Contact
    </x-navlink>

    <x-navlink href="{{route('about')}}"   :active="request()->routeIs('about')">
        About
    </x-navlink>


    @if (Route::has('login'))
            @auth
                <x-navlink href="{{route('build-creator')}}" :active="request()->routeIs('build-creator')">
                    Create a Build
                </x-navlink>

                <x-navlink href="{{route('dashboard')}}">
                    Dashboard
                </x-navlink>
            @else
            <x-navlink href="{{route('login')}}">
                Login
            </x-navlink>

                @if (Route::has('register'))
                    <x-navlink href="{{route('register')}}">Register</x-navlink>
                @endif
            @endauth
        @endif
</nav>
