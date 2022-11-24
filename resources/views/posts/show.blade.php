<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-4xl font-bold text-gray-700 dark:text-gray-200">{{$post->name}}</h1>
                <div class="text-base sm:text-lg text-gray-700 dark:text-gray-200 my-8 break-words font-semibold">
                    {!!$post->extract!!}
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    {{-- Main content --}}
                    <div class="lg:col-span-2">
                        <figure class="mb-8">
                            @if ($post->image)
                
                                <img class="w-full h-72 object-cover object-center rounded-2xl" src="{{Storage::url($post->image->url)}}" alt="">
                            @else
                                <img class="w-full h-72 object-cover object-center rounded-2xl" src="{{asset('img/img-ask.jpg')}}" alt="">
                            @endif
                        </figure>
                        <div id="post-body" class="my-6 text-base sm:text-lg text-gray-700 dark:text-gray-200 break-words font-semibold">
                            {!! $post->body !!}
                        </div>
                    </div>
                    {{-- Related content --}}
                    <aside class="col-span-1">
                        <h3 class="text-2xl text-gray-700 dark:text-gray-200 font-bold">Más de {{$post->category->name}}</h3>
                        <ul class="list-none">
                            @foreach ($similars as $similar)
                                <li class="mb-4">
                                    <a class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-2" href="{{route('posts.show', $similar)}}">
                                        <div class="w-30">
                                            @if ($similar->image)
                                                <img class="rounded-2xl w-full h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                            @else
                                                <img class="rounded-2xl w-30 h-20 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="">
                                            @endif
                                        </div>
                                        <span class="ml-2 text-gray-700 dark:text-gray-200 font-bold">{{$similar->name}}</span>
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