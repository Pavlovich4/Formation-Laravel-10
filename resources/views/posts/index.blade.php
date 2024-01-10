<x-layout title="Liste des articles">
    <div class="grid grid-cols-4 gap-3">
        @forelse($posts as $post)
            <a href="{{ route('posts.show', [
                'id' => $post->id,
                'slug' => $post->slug
            ]) }}">
                <div class="flex flex-col bg-white shadow p-1 rounded gap-1">
                    <img src="https://fakeimg.pl/600x400/4657d9/ffffff" alt="">
                    <span class="text-gray-700 text-sm">{{ $post->title }}</span>
                    <p class="text-gray-500 text-xs">{{ str($post->content)->limit(50) }}</p>
                </div>
            </a>
        @empty
            <small class="text-gray-500 italic">Pas d'article</small>
        @endforelse
    </div>

    <div class="mt-2">
        {{ $posts->links() }}
    </div>
</x-layout>
