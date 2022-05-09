<x-app-layout>
    <div class="container py-8">
        <div class="sm:px-4">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-700">Categor&iacute;a: {{$category->name}}</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($posts as $post)
                    <x-card-post :post="$post" />
                @endforeach
            </div>
            <div class="mt-4">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</x-app-layout>