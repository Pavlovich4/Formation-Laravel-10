<x-layout title="Editer un article">
    @include('posts.form', [
    'method' => 'PUT',
    'action' => route('posts.update', $post),
    'post' => $post,
    'tags' => $tags
])
</x-layout>
