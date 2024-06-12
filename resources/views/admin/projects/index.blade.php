<!-- resources/views/admin/projects/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Progetti</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Vedi</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- resources/views/admin/types/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestione Tipologie</h1>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">Crea Nuova Tipologia</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


