<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <h1 class="text-yellow-400 font-bold underline">
        Hello world!
    </h1>
    <x-alert title="Any Message!" />

    <x-alert title="Any Message!" secondary />

    <x-alert title="Success Message!" positive />

    <x-alert title="Error Message!" negative />

    <x-alert title="Alert Message!" warning />

    <x-alert title="Information Message!" info />

</body>

</html>