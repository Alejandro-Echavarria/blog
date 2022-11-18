<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-4xl font-bold text-gray-700">{{$post->name}}</h1>
                <div class="text-base sm:text-lg text-gray-700 my-4 break-words font-semibold backdrop-blur-sm p-5 rounded-2xl border bg-white/20 text-justify">
                    {!!$post->extract!!}
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 backdrop-blur-sm p-5 rounded-2xl border bg-white/20">
                    {{-- Main content --}}
                    <div class="lg:col-span-2">
                        <figure>
                            @if ($post->image)
                
                                <img class="w-full h-72 object-cover object-center rounded-lg" src="{{Storage::url($post->image->url)}}" alt="">
                            @else
                                <img class="w-full h-72 object-cover object-center rounded-lg" src="{{asset('img/img-ask.jpg')}}" alt="">
                            @endif
                        </figure>
                        <div id="post-body" class="my-6 text-base sm:text-lg text-gray-700 break-words font-semibold text-justify">
                            {!! $post->body !!}
                        </div>
                    </div>
                    {{-- Related content --}}
                    <aside class="col-span-1">
                        <h3 class="text-2xl text-gray-700 font-bold">Más de {{$post->category->name}}</h3>
                        <ul class="list-none">
                            @foreach ($similars as $similar)
                                <li class="mb-4">
                                    <a class="flex mt-2" href="{{route('posts.show', $similar)}}">
                                        @if ($similar->image)
                                            <img class="rounded-lg w-30 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                        @else
                                            <img class="rounded-lg w-30 h-20 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="">
                                        @endif
                                        <span class="ml-2 text-gray-700 font-bold">{{$similar->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tableRemove = document.querySelector("figure.table");

            if (tableRemove) {
                
                tableRemove.classList.remove('table');
            }
        });
    </script>
</x-app-layout>