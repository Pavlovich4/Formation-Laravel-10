<x-layout :title="$post->title">
    <div class="flex justify-between bg-blue-500 p-4 text-white rounded">
        <a href="{{ route('posts.index') }}"> ← Retour</a>
        <div class="flex gap-2">
            <span>Par: {{ $post->author->name }}</span>
            <span>Le {{ $post->created_at->format('d/m/Y') }}</span>
        </div>
    </div>
    <div class="bg-white p-5 rounded mt-2 leading-8">
        <h1 class="text-3xl">{{ $post->title }}</h1>
        <p class="p-5">
            {{ $post->content }}
        </p>
    </div>
</x-layout>
