<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function view($id)
    {
        $note = Note::withTrashed()->findOrFail($id);
        return view('note', [
            'note' => $note,
        ]);
    }
}
