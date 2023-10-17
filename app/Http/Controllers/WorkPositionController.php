<?php

namespace App\Http\Controllers;

use App\Models\WorkPosition;
use Illuminate\Http\Request;

class WorkPositionController extends Controller
{

    public function index()
    {
        $workPositions = WorkPosition::all();
        return view('workPositions.index', compact('workPositions'));
    }

    public function create()
    {
        return view('workPositions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        WorkPosition::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('workPositions.index')->with('success', 'Cargo creado exitosamente');
    }

    public function edit($id)
    {
        $workPosition = WorkPosition::find($id);
        return view('workPositions.edit', compact('workPosition'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $workPosition = WorkPosition::find($id);
        $workPosition->name = $request->input('name');
        $workPosition->save();

        return redirect()->route('workPositions.index')
            ->with('success', 'Cargo actualizada exitosamente');
    }

    public function destroy($id)
    {
        $workPosition = WorkPosition::find($id);

        if ($workPosition) {
            $workPosition->delete();
            return redirect()->route('workPositions.index')
                ->with('success', 'Cargo eliminado exitosamente');
        } else {
            return redirect()->route('workPositions.index')
                ->with('error', 'Cargo no encontrado');
        }
    }

}
