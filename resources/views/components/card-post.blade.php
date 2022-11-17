@props(['post'])

<article class="rounded-2xl overflow-hidden border">
    <a href="{{route('posts.show', $post)}}">
        @if ($post->image)
            
            <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
        @else
            <img class="w-full h-72 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="">
        @endif
    </a>
    <div class="px-6 py-4 h-56 scrollCustom overflow-y-auto backdrop-blur-sm bg-white/20 rounded-2xl">
        <a href="{{route('posts.show', $post)}}">
            <h2 class="font-bold text-xl text-gray-700 mb-4 break-words">
                {{$post->name}}
            </h2>
        </a>
        <div class="text-gray-700 my-4 break-words text-lg">
            {!!$post->extract!!}
        </div>
        <div class="pb-4">
            @foreach ($post->tags as $tag)
                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 mr-2 mt-2 py-1 bg-{{$tag->color}}-200 text-gray-700 text-sm rounded-full font-bold">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</article>