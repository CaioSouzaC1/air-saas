<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite('resources/css/app.css')

    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
<div class="max-w-md m-auto px-4"> 

    <main class="min-h-screen">
        {{ $slot }}
    </main>
</div>
</body>

</html>
