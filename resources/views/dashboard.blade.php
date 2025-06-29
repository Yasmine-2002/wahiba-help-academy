<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h3 class="text-lg font-bold mb-4">Gestion des Cours</h3>
        <a href="{{ route('admin.courses.create') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            ➕ Ajouter un cours
        </a>
    </div>
</div>

</x-app-layout>
