<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi lista de canciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('song.index') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-4 dark:focus:ring-yellow-900">Regresar</a>
            formulario de crear canciones
        <form action="{{ route('song.update', $song) }}" class="mt-4" method="post">
            @method('put')
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <input type="text" name="nombre" value="{{ $song->nombre }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('nombre')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 ">Artista</label>
                <input type="text" name="artista"  value="{{ $song->artista }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('artista')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Enviar</button>
        </form>
        </div>
    </div>
</x-app-layout>
