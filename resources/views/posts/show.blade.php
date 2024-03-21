<x-layout :title="$post->title">
    <div class="flex justify-between bg-blue-500 p-4 text-white rounded">
        <a href="{{ route('posts.index') }}"> ← Retour</a>
        <div class="flex gap-2 items-center">
            <div class="flex gap-1" x-data>
               @can('update', $post)
               <a href="{{ route('posts.edit', $post) }}" class="bg-indigo-500 p-1 rounded text-white inline-block">Editer</a>
               @endcan
                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST" x-ref="delete">
                    @method('DELETE')
                    @csrf
                     <button type="button" @click.prevent="confirm('Voulez-vous vraiment supprimer cet article ?') ? $refs.delete.submit() : false" class="bg-red-500 p-1 rounded text-white inline-block">Supprimer</button>
                </form>
                @endcan
            </div>
            <div>
                <span>Par: {{ $post->author->name }}</span>
                <span>Le {{ $post->created_at->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>
    <div class="flex gap-2 p-2">
        @foreach ($post->tags as $tag)
            <span class="bg-green-300 rounded px-2 py-1">{{ $tag->name }}</span>
        @endforeach
    </div>
    <div class="bg-white p-5 rounded mt-2 leading-8">
        <h1 class="text-3xl">{{ $post->title }}</h1>
        <p class="p-5">
            {{ $post->content }}
        </p>
    </div>
</x-layout>
