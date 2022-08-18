<x-app-layout>
    <div class="container py-8">
        <div class="px-2 sm:px-5">
            <h1 class="text-2xl font-bold text-gray-700">Etiqueta: {{$tag->name}}</h1>
        </div>
        <x-filters-post :tags="$tags" :categories="$categories" />
        <div class="px-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mb-8">
                @foreach ($posts as $post)
                    <x-card-post :post="$post" />
                @endforeach
            </div>
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>