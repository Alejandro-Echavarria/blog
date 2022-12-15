@props(['post'])

<article class="rounded-2xl overflow-hidden border-2 dark:border-gray-600">
    <a href="{{route('posts.show', $post)}}">
        @if ($post->image)
            
            <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="{{ $post->alt }}">
        @else
            <img class="w-full h-72 object-cover object-center" src="{{asset('img/img-ask.jpg')}}" alt="{{ $post->alt }}">
        @endif
    </a>
    <div class="px-6 py-4 h-56 scrollCustom overflow-y-auto rounded-2xl">
        <a href="{{route('posts.show', $post)}}">
            <h4 class="font-bold text-xl text-gray-700 dark:text-gray-200 mb-4 break-words">
                {{$post->name}}
            </h4>
        </a>
        <div class="text-gray-700 dark:text-gray-200 my-4 break-words text-base sm:text-lg">
            {!!$post->extract!!}
        </div>
        <div class="pb-4">
            @foreach ($post->tags as $tag)
                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 mr-2 mt-2 py-1 bg-{{$tag->color}}-200 text-gray-700 text-sm rounded-full font-bold">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</article>