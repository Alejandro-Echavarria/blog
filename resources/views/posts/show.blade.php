<x-app-layout>
    <div class="container py-8">
        <div class="sm:px-4">
            <h1 class="text-4xl font-bold text-gray-700">{{$post->name}}</h1>
            <div class="text-lg text-gray-400 my-4 break-words">
                {!!$post->extract!!}
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                {{-- Main content --}}
                <div class="lg:col-span-2">
                    <figure>
                        @if ($post->image)
            
                            <img class="w-full h-72 object-cover object-center rounded-md" src="{{Storage::url($post->image->url)}}" alt="">
                        @else
                            <img class="w-full h-72 object-cover object-center rounded-md" src="{{asset('img/img-ask.jpg')}}" alt="">
                        @endif
                    </figure>
                    <div id="post-body" class="my-6 text-base text-gray-500 break-words">
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
                                        <img class="rounded-md w-30 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                    @else
                                        <img class="rounded-md w-30 h-20 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="">
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let tableRemove = document.querySelector("figure.table");
            tableRemove.classList.remove('table');
        });
    </script>
</x-app-layout>