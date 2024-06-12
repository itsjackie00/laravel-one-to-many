<!-- resources/views/admin/projects/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.index') }}" class="btn btn-primary">Torna indietro</a>
</div>
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
        @if ($project->type)
            <p><strong>Tipologia:</strong> {{ $project->type->name }}</p>
        @else
            <p><strong>Tipologia:</strong> Non specificata</p>
        @endif
    </div>
@endsection


