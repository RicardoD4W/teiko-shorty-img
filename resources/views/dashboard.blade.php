@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="space-y-6">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
            ¡Bienvenido!
        </h2>

        <p class="text-gray-600 dark:text-gray-300">
            Has iniciado sesión correctamente. Aquí podrás gestionar tus contenidos o ver tus imágenes subidas.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-2">📤 Subir imagen</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Accede al panel para subir nuevas imágenes.</p>
                <a href="/upload"
                    class="inline-block mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">
                    Ir a subir
                </a>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-2">🖼️ Galería</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Visualiza todas las imágenes almacenadas en el sistema.
                </p>
                <a href="/gallery"
                    class="inline-block mt-4 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium">
                    Ver galería
                </a>
            </div>
        </div>
    </section>
@endsection
