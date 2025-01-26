<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <h1 class="ms-5 mt-3">Logged as <span class="fs-4 fst-italic text-decoration-underline text-info">{{ Auth::user()->name }}</span></h1>
    @livewire("show-user", $users);
    <h2 class="ms-5"><a href="{{ route("logout") }}">Logout</a></h2>

    @livewireScripts
</body>
</html>
