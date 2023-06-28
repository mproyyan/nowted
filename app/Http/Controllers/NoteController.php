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

    public function insert(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required',
            'created_at' => 'date|required',
            'folder_id' => 'nullable|exists:App\Models\Folder,id'
        ]);

        $validated['content'] = request('content');
        $note = Note::create($validated);
        return redirect()->route('note.detail', ['id' => $note->id])->with('fm.folder-success', 'Note create successfully!');
    }
}
