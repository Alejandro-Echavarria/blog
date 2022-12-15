@props(['categories', 'tags'])

@php
    $decorador = '<div class="absolute w-6 m-auto  inset-x-0 bottom-0"><div class="border-b-4 border-gray-700 dark:border-gray-200 rounded-md"></div></div>';
@endphp

<div class="my-8 px-5 border-2 dark:border-gray-600 rounded-2xl">
    <div class="accordion-header cursor-pointer transition flex space-x-2 items-center h-16 w-32">
        <i class="fas fa-plus text-gray-700 dark:text-gray-200"></i>
        <h3 class="text-xl text-gray-700 dark:text-gray-200 font-bold">Filtrar</h3>
    </div>
    <!-- Content -->
    <div class="accordion-content pt-0 max-h-0 overflow-auto">
        <div class="items-baseline space-x-4">
            <div class="mb-4 grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-gray-700 dark:text-gray-200 font-bold text-xl">Categor&iacute;as</h3>
                    <div class="py-3">
                        <div class="border-b-2 dark:border-gray-600 rounded-md"></div>
                    </div>
                    <div class="flex flex-wrap">
                        @foreach ($categories as $category)
                        <div class="mb-4">
                            <a href="{{route('posts.category', $category)}}" class="relative text-gray-700 dark:text-gray-200 hover:bg-gray-300/50 transition rounded-lg text-sm font-bold px-3 py-2">{{$category->name}}
                                @php
                                    $categoria = request()->is("category/{$category->slug}");
                                @endphp
                                {!! $categoria ? $decorador : ""!!}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h3 class="text-gray-700 dark:text-gray-200 font-bold text-xl">Etiquetas</h3>
                    <div class="py-3">
                        <div class="border-b-2 dark:border-gray-600 rounded-md"></div>
                    </div>
                    <div class="flex flex-wrap">
                        @foreach ($tags as $tag)
                            <div class="mb-4">
                                <a href="{{route('posts.tag', $tag)}}" class="relative text-gray-700 dark:text-gray-200 hover:bg-gray-300/50 transition rounded-lg text-sm font-bold px-3 py-2" style="margin-bottom: 50px">{{$tag->name}}
                                    @php
                                        $etiqueta = request()->is("tag/{$tag->slug}");
                                    @endphp
                                    {!! $etiqueta ? $decorador : ""!!}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>