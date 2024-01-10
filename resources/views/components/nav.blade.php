<nav class="bg-blue-600 p-3 text-white shadow">
    <div class="flex justify-between">
        <ul class="flex items-center gap-3">
            <li class="p-1 {{ request()->routeIs('home') ? 'border border-white rounded font-bold' : '' }}"><a href="{{ route('home') }}">Accueil</a></li>
            <li><a class="p-1 {{ request()->routeIs('posts.index') ? 'border border-white rounded font-bold' : '' }}" href="{{ route('posts.index') }}">Liste des articles</a></li>
        </ul>

        <ul>
            <li><a class="p-1 {{ request()->routeIs('posts.create') ? 'border border-white rounded font-bold' : '' }}" href="{{ route('posts.create') }}">Ajouter un article</a></li>
        </ul>
    </div>
</nav>
