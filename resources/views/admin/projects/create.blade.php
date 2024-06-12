<!-- resources/views/admin/projects/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea Nuovo Progetto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salva</button>
        </div>
    </form>
</div>
@endsection