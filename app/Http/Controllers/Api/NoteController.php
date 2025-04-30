<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of all notes.
     */
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    /**
     * Store a newly created note in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date_time' => 'required|date',
            'body' => 'required|string',
            'classification' => 'required|string|max:255',
        ]);

        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    /**
     * Display the specified note.
     */
    public function show(Note $note)
    {
        return response()->json($note, 200);
    }

    /**
     * Update the specified note in the database.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'date_time' => 'sometimes|required|date',
            'body' => 'sometimes|required|string',
            'classification' => 'sometimes|required|string|max:255',
        ]);

        $note->update($request->all());
        return response()->json($note, 200);
    }

    /**
     * Remove the specified note from the database.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}