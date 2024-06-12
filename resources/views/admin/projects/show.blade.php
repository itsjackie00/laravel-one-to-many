<!-- resources/views/admin/projects/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.index') }}" class="btn btn-primary">Torna indietro</a>
</div>
@endsection

