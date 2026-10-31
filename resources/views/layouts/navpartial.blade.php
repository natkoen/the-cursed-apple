<nav class="flex flex-row justify-center align-center bg-[#242424] mb-3 p-1">
    <x-navlink href="{{route('home')}}"    :active="request()->routeIs('home')">
        <img src="{{Vite::asset('resources/images/general/logo.png')}}" class="object-center size-10" alt="">
    </x-navlink>

    <x-navlink href="{{route('heroes.index')}}"   :active="request()->routeIs('heroes.index')">
        Heroes
    </x-navlink>

    <x-navlink href="{{route('builds.index')}}"   :active="request()->routeIs('builds.index')">
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
                <x-navlink href="{{route('builds.create')}}" :active="request()->routeIs('builds.create')">
                    Create a Build
                </x-navlink>

            @if(Auth::user()->role == "1")
                <x-navlink href="{{route('admin.dashboard')}}">
                    Admin Overview
                </x-navlink>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>

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
