@props(['categories', 'tags'])

@php
    $decorador = '<div class="absolute w-6 m-auto  inset-x-0 bottom-0"><div class="border-b-4 border-gray-700 dark:border-gray-200 rounded-md"></div></div>';
@endphp

<div class="mb-8">
    <div class="accordion-header cursor-pointer transition flex space-x-2 items-center h-16 w-32">
        <i class="fas fa-plus text-gray-700 dark:text-gray-200"></i>
        <h3 class="text-xl text-gray-700 dark:text-gray-200 font-bold">Filtrar</h3>
    </div>
    <!-- Content -->
    <div class="border-2 border-gray-200/60 rounded-2xl">
        <div class="accordion-content px-5 pt-0 max-h-0 overflow-auto">
            <div>
                <div class="items-baseline space-x-4 py-5">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="">
                            <h3 class="px-3 text-gray-700 dark:text-gray-200 font-bold">Categor&iacute;as</h3>
                            <div class="mx-3 py-3">
                                <div class="border-b-4 border-gray-200/60 rounded-md"></div>
                            </div>
                            <div class="flex flex-wrap">
                                @foreach ($categories as $category)
                                <div class="mb-4">
                                    <a href="{{route('posts.category', $category)}}" class="relative text-gray-700 dark:text-gray-200 hover:bg-gray-200/80 dark:hover:bg-gray-700/80 transition rounded-lg text-sm font-bold px-3 py-2">{{$category->name}}
                                        @php
                                            $categoria = request()->is("category/{$category->slug}");
                                        @endphp
                                        {!! $categoria ? $decorador : ""!!}
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="">
                            <h3 class="px-3 text-gray-700 dark:text-gray-200 font-bold">Etiquetas</h3>
                            <div class="mx-3 py-3">
                                <div class="border-b-4 border-gray-200/60 rounded-md"></div>
                            </div>
                            <div class="flex flex-wrap">
                                @foreach ($tags as $tag)
                                    <div class="mb-4">
                                        <a href="{{route('posts.tag', $tag)}}" class="relative text-gray-700 dark:text-gray-200 hover:bg-gray-200/80 dark:hover:bg-gray-700/80 transition rounded-lg text-sm font-bold px-3 py-2" style="margin-bottom: 50px">{{$tag->name}}
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
    </div>
</div>