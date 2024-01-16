<x-layout title="Ajouter un article">
    <form action="{{ route('posts.store') }}" class="flex flex-col gap-4 p-4 " method="POST">
        <h1 class="text-2xl mb-2">Créer un nouvel article</h1>
        @csrf
        <div class="flex flex-col">
            <label for="title" class="font-semibold">Titre de votre article</label>
            <input type="text" value="{{ old('title') }}" id="title" name="title" class="border rounded py-2 px-2 shadow">
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center mb-4">
            <input id="default-checkbox" name="is_published" type="checkbox" value="@checked(old('is_published'))" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Publier l'article</label>
            @error('is_published')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="content" class="font-semibold">Contenu</label>
            <textarea
                name="content"
                id="content"
                cols="30"
                rows="10"
                class="border rounded py-2 px-2 shadow"
            >{{ old('content') }}</textarea>
            @error('content')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button class="bg-blue-500 text-white p-1 rounded text-xl hover:bg-blue-600 rounded">Submit</button>
    </form>
</x-layout>
