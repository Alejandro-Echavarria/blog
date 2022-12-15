<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <x-filters-post :tags="$tags" :categories="$categories" />
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10">
                    @foreach ($posts as $post)
                        <article class="w-full h-80 overflow-auto bg-cover bg-center rounded-2xl @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else {{asset('img/img-ask.jpg')}} @endif)">
                            <div class="w-full h-full px-8 flex flex-col justify-center">
                                <div class="backdrop-blur-sm bg-black/20 px-3 py-1 rounded-lg">
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
                <div class="mt-8">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>