<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    @vite(["resources/js/app.js", "resources/css/app.css"])
    @livewireStyles
</head>
<body>
    <div class="d-flex w-100 justify-content-center mt-5">
        @livewire('register')
    </div>

    @livewireScripts
</body>
</html>
