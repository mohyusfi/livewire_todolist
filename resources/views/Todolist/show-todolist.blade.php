<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    @livewire('todolist')
    @livewireScripts
</body>
</html>
