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
    <div class="container">
        <h1>Modifica Progetto</h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Altri campi del progetto -->

            <div class="form-group">
                <label for="type_id">Tipologia</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">Seleziona una tipologia</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
    <!-- resources/views/admin/types/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Tipologia</h1>
        <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection