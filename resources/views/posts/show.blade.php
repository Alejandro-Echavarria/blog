<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="{{ asset('vendor/prismjs/prism.css') }}">
    @endsection
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-4xl font-bold text-gray-700 dark:text-gray-200">{{$post->name}}</h1>
                <div id="post-extract" class="text-base sm:text-lg text-gray-700 dark:text-gray-200 my-8 break-words">
                    {!!$post->extract!!}
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    {{-- Main content --}}
                    <div class="lg:col-span-2">
                        <figure class="mb-8">
                            @if ($post->image)
                                <img class="w-full h-80 object-cover object-center rounded-2xl" src="{{Storage::url($post->image->url)}}" alt="{{ $post->alt }}">
                            @else
                                <img class="w-full h-80 object-cover object-center rounded-2xl" src="{{asset('img/img-ask.jpg')}}" alt="{{ $post->alt }}">
                            @endif
                        </figure>
                        <div>
                            <small class="font-semibold text-gray-500 dark:text-gray-400"><span>Author</span></small>
                            <div class="flex justify-between place-items-center mt-3 space-x-4">
                                <div class="flex space-x-4">
                                    <img class="h-[32px] w-[32px] rounded-full"
                                        src="{{ $post->user->profile_photo_url }}"
                                        alt="{{ $post->user->name }}">
                                    <div class="m-auto">
                                        <h3 class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $post->user->name }}</h3>
                                    </div>
                                </div>
                                <div class="justify-end">
                                    <small class="font-semibold text-gray-500 dark:text-gray-400">
                                        <p class="text-left"><time>{{ $post->created_at->format("m-d-Y") }}</time></p>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <hr class="my-6 border-t-2 sm:mx-auto dark:border-gray-600"/>
                        <div id="post-body" class="my-6 text-base sm:text-lg text-gray-700 dark:text-gray-200 break-words">
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
                                                <img class="rounded-2xl w-full h-36 md:h-52 lg:h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="{{ $similar->alt }}">
                                            @else
                                                <img class="rounded-2xl w-full h-36 md:h-52 lg:h-20 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="{{ $similar->alt }}">
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
    @section('js')
        <script src="{{ asset('vendor/prismjs/prism.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const tableRemove = document.querySelector("figure.table");
    
                if (tableRemove) {
                    
                    tableRemove.classList.remove('table');
                }
            });
        </script>
    @endsection
</x-app-layout>
