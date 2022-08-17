<x-app-layout>
    <div class="container">
        <div class="my-5 px-2 sm:px-5">
            <div class="accordion-header cursor-pointer transition flex space-x-5 items-center h-16">
                <i class="fas fa-plus text-gray-700"></i>
                <h3 class="text-2xl text-gray-700 font-bold">Filtro</h3>
            </div>
            <!-- Content -->
            <div class="bg-gray-800 rounded-md">
                <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                    <div class="">
                        <div class="items-baseline space-x-4 py-5">
                            <div class="flex">
                                <div>
                                    <h3 class="px-3 text-gray-50 font-bold">Categor&iacute;as</h3>
                                    <div class="mx-3 py-3">
                                        <div class="border-b-4 border-slate-200 rounded-md"></div>
                                    </div>
                                    @foreach ($categories as $category)
                                        <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md text-sm font-bold px-3 py-2">{{$category->name}}</a>
                                    @endforeach
                                </div>
                                <div>
                                    <h3 class="px-3 text-gray-50 font-bold">Etiquetas</h3>
                                    <div class="mx-3 py-3">
                                        <div class="border-b-4 border-slate-200 rounded-md"></div>
                                    </div>
                                    @foreach ($categories as $category)
                                        <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md text-sm font-bold px-3 py-2">{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 sm:px-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10">
            @foreach ($posts as $post)
                <article class="w-full h-80 shadow overflow-auto bg-cover bg-center rounded-md @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else {{asset('img/img-ask.jpg')}} @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="backdrop-blur-sm bg-slate-800/50 px-3 py-1 rounded-md">
                            <h1 class="text-3xl text-white font-bold">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                        </div>
                        <div class="pt-2 flex overflow-x-auto scrollCustom">
                            <div class="h-10">
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 mt-2 py-1 bg-{{$tag->color}}-200 text-gray-700 text-sm rounded-full font-bold">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        {{-- Pagination --}}
        <div class="sm:px-4 mt-8">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>