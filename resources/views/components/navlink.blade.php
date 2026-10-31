@props(['active' => false])

<a class="flex flex-1 justify-center items-center m-1 italic font-bold font-serif" {{ $attributes }} style="color: {{ $active ? 'white' : 'gray' }}">{{ $slot }}</a>

