<x-app-layout>
    <div class="bg-slate-200">
        <div class="container py-8">
            <div class="px-4 grid grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="w-full h-80 bg-cover bg-center rounded-md @if($loop->first) col-span-2 @endif" style="background-image: url({{Storage::url($post->image->url)}})">
                        <div class="w-full h-full px-8 flex flex-col justify-center">
                            <h1 class="text-4xl text-white font-bold">
                                <a href="">
                                    {{ $post->name }}
                                </a>
                            </h1>
                            <div class="pt-2">
                                @foreach ($post->tags as $tag)
                                    <a href="" class="inline-block px-6 h-6 bg-gray-500 text-white rounded-full font-bold">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>