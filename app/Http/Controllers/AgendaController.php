<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = agenda::all();
        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        agenda::create($request->all());

        return redirect()->route('agenda.index')
            ->with('success', 'Agenda created successfully');
    }

    public function edit($id)
    {
        $agenda = agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        $agenda = agenda::findOrFail($id);
        $agenda->update($request->all());

        return redirect()->route('agenda.index')
            ->with('success', 'Agenda updated successfully');
    }

    public function destroy($id)
    {
        $agenda = agenda::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}