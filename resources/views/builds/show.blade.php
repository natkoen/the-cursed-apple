<x-layout title="Builds for {{$build->name}}">


    <x-card>
        <div class="flex flex-row w-full justify-between font-serif">
            <div id="build-text" class="flex flex-1 flex-col text-left gap-y-0.5">
                <div class="mb-3">
                    <h3 class="font-bold italic text-neutral-300 text-3xl">{{$build->name}}</h3>
                    <img src="{{Vite::asset($build->hero->image_url)}}" alt="">
                </div>

                <div class="mb-3">
                    <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Description
                    </h2>
                    <p class="font-light font-mono text-neutral-200">
                    {{$build->description}}
                    </p>
                </div>

                <div class="mb-3">
                    <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Code
                    </h2>

                    <p class="font-light font-mono text-neutral-200">
                        {{$build->build_code}}
                    </p>
                </div>

                <div class="flex flex-col mb-3">
                    <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Tags
                    </h2>
                    <div class="flex flex-row gap-1">
                        @forelse ($build->tags as $tag)
                            <div class="bg-[#265636] p-1 font-mono text-neutral-200 uppercase">{{$tag->name}}</div>
                        @empty
                            <span>No tags</span>
                        @endforelse
                    </div>
                </div>

                <div class="mb-3">
                <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Creator
                    </h2>
                     <div class="font-light font-mono text-neutral-200">
                         {{$build->user->name}}
                     </div>

                </div>
                <div class="mb-3">
                    <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Created at:
                    </h2>
                    <div class="font-light font-mono text-neutral-200">
                    {{$build->created_at}}
                    </div>
                </div>

                <div class="mb-3">
                <h2 class="font-bold text-neutral-500 text-sm uppercase">
                        Last updated at:
                    </h2>
                    <div class="font-light font-mono text-neutral-200">
                            {{$build->updated_at}}
                    </div>
                </div>

                @auth
                    @if(auth()->id() == $build->user_id || auth()->user()->role() == "1")
                        <div class="flex flex-row justify-start gap-x-3">
                            <a class="p-2 bg-[#363636] font-mono uppercase text-neutral-100" href="{{route('builds.edit', $build)}}">Edit Build</a>

                            <form class="p-2 bg-[#662424] font-mono upperase text-neutral-100" action="{{route('builds.destroy', $build)}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Build</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="flex-2">
                <img class="aspect-video max-h-1xl max-w-5xl object-center" src="{{asset('storage/' .$build->build_image)}}" alt="{{$build->name}}">
            </div>
        </div>


    </x-card>

        <x-comment-box :build="$build" :comments="$comments">

        </x-comment-box>

</x-layout>
