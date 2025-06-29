<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Administrateur') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Carte: Niveaux scolaires -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Niveaux</h3>
                <p class="text-3xl mt-2 text-green-600">{{ $subjectsCount ?? 0 }}</p>
            </div>

            <!-- Carte: Élèves -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Élèves</h3>
                <p class="text-3xl mt-2 text-blue-600">{{ $studentsCount ?? 0 }}</p>
            </div>

            <!-- Carte: Cours / Vidéos -->
            <a href="{{ route('admin.courses.create') }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-md transition duration-200">
            <div class="text-gray-600 text-sm">Cours</div>
            <div class="text-xl font-bold text-gray-900">0</div>
            </a>


            <!-- Carte: Annonces -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Annonces</h3>
                <p class="text-3xl mt-2 text-yellow-600">{{ $newsCount ?? 0 }}</p>
            </div>

            <!-- Carte: Abonnements actifs -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Abonnements</h3>
                <p class="text-3xl mt-2 text-red-600">{{ $subscriptionsCount ?? 0 }}</p>
            </div>

            <!-- Carte: Zoom / Planning -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Réunions Zoom</h3>
                <p class="text-3xl mt-2 text-indigo-600">{{ $zoomCount ?? 0 }}</p>
            </div>

            <!-- Carte: Admins -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Administrateurs</h3>
                <p class="text-3xl mt-2 text-pink-600">{{ $adminsCount ?? 0 }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
