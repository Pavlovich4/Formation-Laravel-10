@extends('layouts.master')

@section('title', 'Ici les details')

@section('content')
    <div class="flex justify-between bg-blue-500 p-4 text-white rounded">
        <a href="{{ route('posts.index') }}"> ← Retour</a>
        {{ $post->created_at->format('d/m/Y') }}
    </div>
    <div class="bg-white p-5 rounded mt-2 leading-8">
        <h1 class="text-3xl">{{ $post->title }}</h1>
        <p class="p-5">
            {{ $post->content }}
        </p>
    </div>
@endsection
