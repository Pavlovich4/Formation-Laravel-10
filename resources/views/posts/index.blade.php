<x-layout title="Liste des articles">
    <div class="grid grid-cols-4 gap-3">
        @forelse($posts as $post)

            <div class="flex flex-col bg-white shadow rounded gap-1 group relative p-1">
                <img src="{{ $post->image_url }}" class="h-60" alt="">
                <div class="p-1">
                       <div  class="text-gray-700 text-sm flex justify-between">
                           <a href="{{ route('posts.show', [
                                'post' => $post->id,
                                'slug' => $post->slug,
                            ]) }}">
                               {{ $post->title }}
                           </a>

                           <span>Par {{ $post->author->name }}</span>
                       </div>
                    <p class="text-gray-500 text-xs">{{ str($post->content)->limit(50) }}</p>
                </div>
            </div>
        @empty
            <small class="text-gray-500 italic">Pas d'article</small>
        @endforelse
    </div>

    <div class="mt-2">
        {{ $posts->links() }}
    </div>
</x-layout>
