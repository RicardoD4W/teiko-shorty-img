<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">
    <header class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold"> <a href="/dashboard">Panel de control</a></h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium focus:ring-4 focus:ring-red-300 focus:outline-none">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>

</html>
