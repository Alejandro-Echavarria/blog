<x-app-layout>
    <div class="container py-8">
        <div class="sm:px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center rounded-md @if($loop->first) md:col-span-2 @endif" style="background-image: url({{Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white font-bold">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                        <div class="pt-2">
                            @foreach ($post->tags as $tag)
                                <a href="" class="inline-block px-6 h-6 bg-{{$tag->color}}-500 text-white rounded-full font-bold">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        {{-- Pagination --}}
        <div class="sm:px-4 mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>