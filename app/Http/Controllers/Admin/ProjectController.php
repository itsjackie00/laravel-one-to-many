<?php

// app/Http/Controllers/Admin/ProjectController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'nullable|exists:types,id'
        ]);

        $project = new Project($request->all());
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo.');
    }

    public function show(Project $id)
    {
        $project = Project::with('type')->findOrFail($id);
        return view('projects.show', compact('project'));

    }

    public function edit(Project $id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'nullable|exists:types,id'
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo.');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Progetto eliminato !');
    }
}
