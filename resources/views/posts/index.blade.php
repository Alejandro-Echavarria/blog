<x-app-layout>
    <div class="container py-8">
        <div class="sm:px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center rounded-md @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else {{asset('img/img-ask.jpg')}} @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white font-bold">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
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