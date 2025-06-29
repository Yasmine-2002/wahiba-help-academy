@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📘 Gestion des matières par niveau</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @foreach($levels as $level)
        <div class="mb-6 bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-bold text-gray-700 mb-3">🎓 {{ $level->name }}</h3>

            @if($level->subjects->isEmpty())
                <p class="text-gray-500">Aucune matière enregistrée.</p>
            @else
                <ul class="pl-5 text-gray-700 space-y-2">
    @foreach($level->subjects as $subject)
        <li class="flex justify-between items-center border-b py-1">
            <span>{{ $subject->name }}</span>

            <form method="POST" action="{{ route('admin.subjects.destroy', $subject) }}" onsubmit="return confirm('Supprimer cette matière ?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:text-red-800 text-sm px-3 py-1 rounded hover:bg-red-100 transition">
                    🗑️ Supprimer
                </button>
            </form>
        </li>
    @endforeach
</ul>
 </ul>
            @endif
        </div>
    @endforeach

    {{-- Formulaire d'ajout --}}
    <div class="bg-white shadow rounded-xl p-6 mt-8">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">➕ Ajouter une matière</h3>

        <form method="POST" action="{{ route('admin.subjects.store') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf

            <div>
                <label for="name" class="block text-sm text-gray-600 mb-1">Nom de la matière</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="level_id" class="block text-sm text-gray-600 mb-1">Niveau</label>
                <select name="level_id" id="level_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
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
