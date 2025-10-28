<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    public function addPerson()
    {
        return view('new');
    }

    public function confirmAdd(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'round' => 'required|integer',
            'score' => 'required|integer',
        ]);

        Participante::create($validated);

        return redirect()->route('home')->with('success', 'Participante adicionado com sucesso!');
    }

    public function getData()
    {
        $participantes = Participante::orderBy('score', 'desc')->get();

        return view('home', compact('participantes'));
    }

    public function editPerson($id)
    {
        $participante = Participante::findOrFail($id);
        return view('edit', compact('participante'));
    }

    public function confirmEdit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'round' => 'required|integer',
            'score' => 'required|integer',
        ]);

        $participante = Participante::findOrFail($id);
        $participante->update($validated);

        return redirect()->route('home')->with('success', 'Participante atualizado com sucesso!');
    }

    public function deletePerson($id)
    {
        $participante = Participante::findOrFail($id);
        $participante->delete();

        return redirect()->route('home')->with('success', 'Participante excluído com sucesso!');
    }
}
