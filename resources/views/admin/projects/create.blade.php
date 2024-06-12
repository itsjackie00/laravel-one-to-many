<!-- resources/views/admin/projects/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea Nuovo Progetto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <!-- Altri campi del progetto -->

        <div class="form-group">
            <label for="type_id">Tipologia</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Seleziona una tipologia</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

    </form>
    <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
</div>
@endsection

