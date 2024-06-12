<!-- resources/views/admin/projects/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Progetto</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" required>{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Aggiorna</button>
    </form>
</div>
@endsection

