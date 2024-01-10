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
