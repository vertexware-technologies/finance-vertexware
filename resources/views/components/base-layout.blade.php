<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonte (opcional) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">

    <!-- Styles -->
    @vite(['resources/css/app.css']) <!-- Para carregar o CSS gerado pelo Vite -->

    @livewireStyles <!-- Suporte para Livewire, se você estiver usando -->
    @stack('styles') <!-- Para adicionar CSS específico das páginas -->
</head>

<body class="bg-[#0F0E11] text-gray-900 antialiased">

    <!-- Navbar (usando o arquivo livewire.layout.navigation.blade.php) -->
    @include('livewire.layout.navigation')

    <!-- Conteúdo Principal -->
    <main class="container mx-auto py-8">
        {{ $slot }} <!-- Onde o conteúdo da página será renderizado -->
    </main>

    <!-- Footer (Rodapé)
    <footer class="bg-gray-800 text-gray-300 text-center p-4 mt-8">
        &copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.
    </footer>-->

    <!-- Scripts -->
    @vite(['resources/js/app.js']) <!-- Para carregar o JS gerado pelo Vite -->
    @livewireScripts <!-- Suporte para Livewire, se você estiver usando -->
    @stack('scripts') <!-- Para adicionar scripts específicos das páginas -->
</body>

</html>
