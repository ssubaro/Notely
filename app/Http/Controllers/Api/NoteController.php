<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date_time' => 'required|date',
            'body' => 'required|string',
            'classification' => 'required|string|max:255',
        ]);

        $note = Note::create($validated);
        return response()->json($note, 201);
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'date_time' => 'sometimes|required|date',
            'body' => 'sometimes|required|string',
            'classification' => 'sometimes|required|string|max:255',
        ]);

        $note->update($validated);
        return response()->json($note, 200);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(null, 204);
    }
}