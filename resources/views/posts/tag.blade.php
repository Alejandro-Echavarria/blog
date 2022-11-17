<x-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="p-2">
                <h1 class="text-2xl font-bold text-gray-700">Etiqueta: {{$tag->name}}</h1>
                <x-filters-post :tags="$tags" :categories="$categories" />
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mb-8">
                    @foreach ($posts as $post)
                        <x-card-post :post="$post" />
                    @endforeach
                </div>
                <div class="mt-4">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>