<x-layout title="Liste des articles">
    <div class="grid grid-cols-4 gap-3">
        @forelse($posts as $post)

            <div class="flex flex-col bg-white shadow rounded gap-1 group relative p-1">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://fakeimg.pl/600x400/4657d9/ffffff' }}" class="h-60" alt="">
                <div class="p-1">
                       <div  class="text-gray-700 text-sm flex justify-between">
                           <a href="{{ route('posts.show', [
                                'post' => $post->id,
                                'slug' => $post->slug,
                            ]) }}">
                               {{ $post->title }}
                           </a>

                           <div class="flex gap-1" x-data>
                               <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 p-1 rounded text-white inline-block"><x-edit-icon></x-edit-icon></a>
                               <form action="{{ route('posts.destroy', $post) }}" method="POST" x-ref="delete">
                                   @method('DELETE')
                                   @csrf
                                    <button type="button" @click.prevent="confirm('Voulez-vous vraiment supprimer cet article ?') ? $refs.delete.submit() : false" class="bg-red-500 p-1 rounded text-white inline-block"><x-delete-icon></x-delete-icon></button>
                               </form>
                           </div>
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
