<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }},
            // avatar: '{{ optional(auth()->user())->avatar() }}'
            avatar: 'https://media-exp1.licdn.com/dms/image/C5103AQFvJLt35KxJZQ/profile-displayphoto-shrink_200_200/0/1517400280887?e=1652918400&v=beta&t=4hDSD5lwY7oZwIzjffNQRxo-WKZB0gflZ_sDFSAo_zY'
        }
    </script>
</head>
<body>
    <div id="app">
        <main class="container mx-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
