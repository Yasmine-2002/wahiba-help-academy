@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">

    <!-- Formulaire d'ajout -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">📚 Ajouter un nouveau cours</h2>
        @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Intitulé -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Intitulé du cours</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Vidéo -->
                <div>
                    <label for="video_url" class="block text-sm font-medium text-gray-700">Lien de la vidéo</label>
                    <input type="url" name="video_url" id="video_url" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Chapitre -->
                <div>
                    <label for="chapter_id" class="block text-sm font-medium text-gray-700">Chapitre</label>
                    <select name="chapter_id" id="chapter_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="" disabled selected>Choisir un chapitre</option>
                        @foreach($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Matière -->
                <div>
                    <label for="subject_id" class="block text-sm font-medium text-gray-700">Matière</label>
                    <select name="subject_id" id="subject_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="" disabled selected>Choisir une matière</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Niveau -->
                <div>
                    <label for="level_id" class="block text-sm font-medium text-gray-700">Niveau</label>
                    <select name="level_id" id="level_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="" disabled selected>Choisir un niveau</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                    ➕ Publier le cours
                </button>
            </div>
        </form>
    </div>

    <!-- Liste des cours -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">🎞️ Cours publiés</h2>

        @if ($courses->count() > 0)
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">Titre</th>
                        <th class="py-3 px-4 text-left">Matière</th>
                        <th class="py-3 px-4 text-left">Niveau</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($courses as $course)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $course->title }}</td>
                            <td class="py-3 px-4">{{ $course->subject->name ?? '—' }}</td>
                            <td class="py-3 px-4">{{ $course->level->name ?? '—' }}</td>
                            <td class="py-3 px-4 flex space-x-2">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                    ✏️ Modifier
                                </a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                      onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Aucun cours pour le moment.</p>
        @endif
    </div>
</div>
@endsection
