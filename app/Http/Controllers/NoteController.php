<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function view($id)
    {
        $userId = auth()->id();
        $note = Note::withTrashed()
            ->where('user_id', '=', $userId)
            ->findOrFail($id);

        return view('note', [
            'note' => $note,
        ]);
    }

    public function create(Request $request)
    {
        $userId = auth()->id();
        $folderIds = Folder::where('is_archived', '=', false)
            ->where('user_id', '=', $userId)
            ->get(['id', 'name', 'parent_folder']);

        return view('create-note', [
            'folders' => $folderIds,
            'parent' => $request->query('folder', '')
        ]);
    }

    public function insert(Request $req)
    {
        $userId = auth()->id();
        $validated = $req->validate([
            'title' => 'required',
            'created_at' => 'date|required',
            'folder_id' => 'nullable|exists:App\Models\Folder,id'
        ]);

        $validated['content'] = request('content');
        $validated['user_id'] = $userId;
        $note = Note::create($validated);
        return redirect()->route('note.detail', ['id' => $note->id])->with('fm.folder-success', 'Note create successfully!');
    }

    public function edit($id)
    {
        $userId = auth()->id();
        $note = Note::where('user_id', '=', $userId)->findOrFail($id);
        $folderIds = Folder::where('is_archived', '=', false)
            ->where('user_id', '=', $userId)
            ->get(['id', 'name', 'parent_folder']);

        return view('edit-note', [
            'folders' => $folderIds,
            'note' => $note
        ]);
    }

    public function update(Request $req, $id)
    {
        $userId = auth()->id();
        $note = Note::where('user_id', '=', $userId)->findOrFail($id);
        $validated = $req->validate([
            'title' => 'required',
            'created_at' => 'date|required',
            'folder_id' => 'nullable|exists:App\Models\Folder,id'
        ]);

        $validated['content'] = request('content');
        $validated['user_id'] = $userId;
        $note->update($validated);
        return redirect()->route('note.detail', ['id' => $note->id])->with('fm.folder-success', 'Note create successfully!');
    }
}
