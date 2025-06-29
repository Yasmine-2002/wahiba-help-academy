@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
    {{-- Titre --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">📚 Gestion des Niveaux Scolaires</h2>
        <p class="text-gray-500">Consultez, ajoutez ou supprimez les niveaux scolaires disponibles.</p>
    </div>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tableau des années --}}
    <div class="bg-white shadow rounded-xl overflow-hidden mb-6">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Niveau</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($levels as $index => $level)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $level->name }}</td>
                        <td class="px-6 py-4 text-right">
                            <form method="POST" action="{{ route('admin.levels.destroy', $level) }}" onsubmit="return confirm('Supprimer cette année ?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 font-medium text-sm rounded-full px-3 py-1 hover:bg-red-100 transition duration-150">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-400">Aucune année d'étude enregistrée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Formulaire d'ajout --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">➕ Ajouter un Niveau</h3>

        <form method="POST" action="{{ route('admin.levels.store') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            @csrf

            <div class="col-span-2">
                <label for="name" class="block text-sm text-gray-600 mb-1">Niveau</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200" placeholder="Ex : 4AM, 1AS, 3AS..." required>
            </div>

           <div class="mt-6">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                    ➕ Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
