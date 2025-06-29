@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cours publiés</h1>

    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau cours</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Chapitre</th>
                <th>Matière</th>
                <th>Niveau</th>
                <th>Vidéo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->chapter->title ?? '' }}</td>
                <td>{{ $course->subject->name ?? '' }}</td>
                <td>{{ $course->level->name ?? '' }}</td>
                <td><a href="{{ $course->video_url }}" target="_blank">Voir la vidéo</a></td>
                <td>
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce cours ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
