<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
    <link rel="icon" href="/images/brand/logo.svg" type="image/x-icon">
    <script src="https://unpkg.com/imask"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">
    <livewire:header />
    <div class="max-w-md mx-auto px-4">
        <main class="min-h-[calc(100vh-7rem)] py-4">
            {{$slot}}
        </main>
    </div>
    <livewire:footer />
    <x-toast />
</body>
<script>
    document.addEventListener('alpine:init', () => {
            Alpine.magic('moneyMask', () => (input) => {
                return input.length > 5 ? '999,99' : '99,99';
            });
        });
</script>

</html>