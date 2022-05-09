@props(['post'])

<article class="rounded-md shadow overflow-hidden mb-4">
    <a href="{{route('posts.show', $post)}}">
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    </a>
    <div class="px-6 py-4 h-56 overflow-y-auto bg-slate-50">
        <a href="{{route('posts.show', $post)}}">
            <h2 class="font-bold text-xl text-gray-700 mb-4">
                {{$post->name}}
            </h2>
        </a>
        <div class="text-gray-400 my-4">
            {{$post->extract}}
        </div>
        <div class="pb-4">
            @foreach ($post->tags as $tag)
                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 mr-2 py-1 bg-{{$tag->color}}-200 text-gray-700 text-sm rounded-full font-bold">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</article>