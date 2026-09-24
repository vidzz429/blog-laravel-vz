@props(['title' => 'Settings'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo vz.png">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <nav class="border-b border-slate-800 bg-slate-800">
        <div class="mx-auto flex h-16 max-w-5xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <img src="/img/logo vz.png" alt="Logo" class="h-8 w-8 size-9">
            <a href="/" class="text-sm font-medium text-white hover:text-gray-500">
                &larr; Back to Home
            </a>
        </div>
    </nav>

    <main class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-2xl font-bold tracking-tight text-slate-800">{{ $title }}</h1>

        {{ $slot }}
    </main>
</body>

</html>