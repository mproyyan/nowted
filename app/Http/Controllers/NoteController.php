<?php

namespace App\Http\Controllers;

use App\Models\Folder;
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

    public function create(Request $request)
    {
        $folderIds = Folder::where('is_archived', '=', false)->get(['id', 'name', 'parent_folder']);
        return view('create-note', [
            'folders' => $folderIds,
            'parent' => $request->query('folder', '')
        ]);
    }
}
