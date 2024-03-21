<x-layout title="Ajouter un article">
    @include('posts.form', [
        'method' => 'POST',
        'action' => route('posts.store'),
        'post' => $post,
        'tags' => $tags
    ])
</x-layout>
