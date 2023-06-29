<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TrashController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $notes = Note::where('folder_id', '=', null)->where('user_id', '=', $userId)->onlyTrashed()->get();
        $folders = Folder::where('parent_folder', '=', null)->where('user_id', '=', $userId)->onlyTrashed()->get();

        return view('trash', [
            'notes' => $notes,
            'folders' => $folders
        ]);
    }

    public function note(Request $request)
    {
        $userId = auth()->id();
        $noteId = $request->input('note_id', '');
        $note = Note::withTrashed()->where('user_id', '=', $userId)->findOrfail($noteId);

        $note->update([
            'folder_id' => null,
            'is_archived' => false,
            'is_favorited' => false,
            'deleted_at' => $note->trashed() ? null : Date::now()
        ]);

        $message = 'Item successfully moved to trash!';
        if (!$note->trashed()) {
            $message = 'Item recovered successfully!';
        }

        return redirect()->back()->with('fm.trash', $message);
    }

    public function folder(Request $request)
    {
        $userId = auth()->id();
        $folderId = $request->input('folder_id', '');
        $folder = Folder::withTrashed()->where('user_id', '=', $userId)->findOrFail($folderId);

        $folder->update([
            'parent_folder' => null,
            'is_archived' => false,
            'is_favorited' => false,
            'deleted_at' => $folder->trashed() ? null : Date::now()
        ]);

        $this->nestedTrashNotes($folder);
        $this->nestedTrashFolders($folder->trashed(), $folder->children()->withTrashed()->get());

        $message = 'Item successfully moved to trash!';
        if (!$folder->trashed()) {
            $message = 'Item recovered successfully!';
        }

        return redirect()->back()->with('fm.trash', $message);
    }

    public function deleteNote(Request $request)
    {
        $userId = auth()->id();
        $noteId = $request->input('note_id', '');
        $note = Note::withTrashed()->where('user_id', '=', $userId)->findOrFail($noteId);

        $status = $note->forceDelete();
        if (!$status) {
            return redirect()->back()->with('fm.trash-fail', 'Failed to delete item');
        }

        return redirect()->back()->with('fm.trash', 'Item deleted successfully!');
    }

    public function deleteFolder(Request $request)
    {
        $userId = auth()->id();
        $folderId = $request->input('folder_id', '');
        $folder = Folder::withTrashed()->where('user_id', '=', $userId)->findOrFail($folderId);

        $status = $folder->forceDelete();
        if (!$status) {
            return redirect()->back()->with('fm.trash-fail', 'Failed to delete item');
        }

        return redirect()->back()->with('fm.trash', 'Item deleted successfully!');
    }

    private function nestedTrashFolders(Bool $parentStatus, Collection $children)
    {
        foreach ($children as $child) {
            $child->update([
                'is_archived' => false,
                'is_favorited' => false,
                'deleted_at' => $parentStatus ? Date::now() : null
            ]);

            $this->nestedTrashNotes($child);
            $this->nestedTrashFolders($child->trashed(), $child->children()->withTrashed()->get());
        }
    }

    private function nestedTrashNotes(Folder $folder)
    {
        foreach ($folder->notes()->withTrashed()->get() as $note) {
            $note->update([
                'is_archived' => false,
                'is_favorited' => false,
                'deleted_at' => $folder->trashed() ? Date::now() : null
            ]);
        }
    }
}
