<nav class="bg-blue-600 p-3 text-white shadow">
    <ul class="flex items-center gap-3">
        <li class="p-1 {{ request()->routeIs('home') ? 'border border-white rounded font-bold' : '' }}"><a href="{{ route('home') }}">Accueil</a></li>
        <li><a class="p-1 {{ request()->routeIs('posts.index') ? 'border border-white rounded font-bold' : '' }}" href="{{ route('posts.index') }}">Liste des articles</a></li>
    </ul>
</nav>
