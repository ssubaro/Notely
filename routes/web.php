<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteWebController;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::resource('notes', NoteWebController::class);