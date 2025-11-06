@extends('layouts.app')

@section('title', 'Galería')


@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">📸 Galería</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($images->isEmpty())
            <p class="text-gray-500">Aún no hay imágenes subidas.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($images as $image)
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                        <a href="{{ route('image.show', $image->slug) }}" target="_blank">
                            <img src="{{ route('image.show', $image->slug) }}" alt="{{ $image->filename }}"
                                class="w-full h-48 object-cover hover:opacity-90 transition">
                        </a>

                        <div class="p-4 flex justify-between items-center">
                            <p class="truncate text-sm text-gray-700 dark:text-gray-300">{{ $image->filename }}</p>

                            <form action="{{ route('image.destroy', $image->slug) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar esta imagen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
