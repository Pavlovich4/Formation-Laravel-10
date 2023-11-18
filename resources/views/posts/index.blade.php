@extends('layouts.master')

@section('title', 'Liste des articles')

@section('content')
    <ul>
        @forelse($posts as $post)
            <li>{{ $post['title'] }}</li>
        @empty
            <span>Pas d'article</span>
        @endforelse
    </ul>

@endsection
