<!-- Modernized with glassmorphism, gradient background, and improved typography -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-foreground antialiased bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex flex-col justify-center items-center">
        <!-- Animated background gradient orbs -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative z-10 w-full max-w-md px-4">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <a href="/" class="text-center">
                    <x-application-logo class="w-16 h-16 fill-current text-blue-400" />
                </a>
            </div>

            <!-- Card with glassmorphism effect -->
            <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl p-8 space-y-6">
                <div class="text-center mb-2">
                    <h1 class="text-2xl font-bold text-white">Welcome</h1>
                    <p class="text-slate-300 text-sm mt-1">Secure authentication for your account</p>
                </div>
                
                {{ $slot }}
            </div>

            <!-- Footer link -->
            <p class="text-center text-slate-400 text-sm mt-6">
                {{ config('app.name', 'Laravel') }} - Modern Platform
            </p>
        </div>
    </body>
</html>
