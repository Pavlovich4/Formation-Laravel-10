@props(['title'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Mon super site</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <x-nav></x-nav>
    <div class="p-5">
        @if(session()->has('alert'))
            <x-alert :type="session('alert')['type']">{{ session('alert')['message'] }}</x-alert>
        @endif
        {{ $slot }}
    </div>
</body>
</html>
