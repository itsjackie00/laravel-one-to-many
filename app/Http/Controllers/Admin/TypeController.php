<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Type::create($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Tipologia creata con successo.');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $type = Type::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('admin.types.index')->with('success', 'Tipologia aggiornata con successo.');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Tipologia eliminata con successo.');
    }
}
