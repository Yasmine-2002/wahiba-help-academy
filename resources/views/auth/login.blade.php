@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-200 via-green-300 to-green-400">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-green-700">Connexion Admin</h1>
            <p class="text-sm text-gray-500">Accédez à votre espace administrateur</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <label class="text-sm text-gray-700">Se souvenir de moi</label>
            </div>

            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                    Se connecter
                </button>
            </div>

            <div class="text-center text-sm text-gray-600">
                Mot de passe oublié ? <a href="{{ route('password.request') }}" class="text-green-600 hover:underline">Réinitialiser</a>
            </div>
        </form>
    </div>
</div>
@endsection
