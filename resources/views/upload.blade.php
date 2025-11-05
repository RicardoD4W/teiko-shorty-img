@extends('layouts.app')

@section('title', 'Subir imagen')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Subir nueva imagen</h2>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
            <br>
            <a href="{{ session('url') }}" target="_blank" class="underline text-blue-600">
                Ver imagen
            </a>
        </div>
    @endif

    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input type="file" name="image" accept="image/*"
            class="p-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">

        @error('image')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium focus:ring-4 focus:ring-blue-300">
            Subir imagen
        </button>
    </form>
@endsection
