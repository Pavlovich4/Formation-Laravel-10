<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Mon super site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @include('layouts.nav')
<div class="p-5">
    <div class="mb-2">
        @if(session('success'))
            <div class="bg-green-600 text-white p-2 rounded">{{ session('success') }}</div>
        @endif
    </div>
    @yield('content')
</div>
</body>
</html>
