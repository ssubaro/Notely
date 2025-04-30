<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteWebController extends Controller
{
    /**
     * Muestra la lista de notas
     */
    public function index()
    {
        $notes = Note::orderBy('created_at', 'desc')->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Muestra el formulario para crear una nueva nota
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Guarda una nueva nota
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date_time' => 'required|date',
            'body' => 'required|string',
            'classification' => 'required|string|max:255',
        ]);

        Note::create($validated);
        
        return redirect()->route('notes.index')
                         ->with('success', 'Nota creada correctamente.');
    }

    /**
     * Muestra el formulario para editar una nota
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Actualiza una nota existente
     */
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date_time' => 'required|date',
            'body' => 'required|string',
            'classification' => 'required|string|max:255',
        ]);

        $note->update($validated);
        
        return redirect()->route('notes.index')
                         ->with('success', 'Nota actualizada correctamente.');
    }

    /**
     * Elimina una nota
     */
    public function destroy(Note $note)
    {
        $note->delete();
        
        return redirect()->route('notes.index')
                         ->with('success', 'Nota eliminada correctamente.');
    }
}