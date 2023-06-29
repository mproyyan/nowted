<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $notes = Note::where('folder_id', '=', null)->where('user_id', '=', $userId)->archived()->get();
        $folders = Folder::where('parent_folder', '=', null)->where('user_id', '=', $userId)->archived()->get();

        return view('archive', [
            'notes' => $notes,
            'folders' => $folders
        ]);
    }

    public function note(Request $request)
    {
        $userId = auth()->id();
        $noteId = $request->input('note_id', '');
        $note = Note::where('user_id', '=', $userId)->findOrFail($noteId);

        $note->update([
            'folder_id' => null,
            'is_archived' => !$note->is_archived,
            'is_favorited' => false
        ]);

        $message = 'Archive item successfully!';
        if (!$note->is_archived) {
            $message = 'Unarchive item successfully!';
        }

        return redirect()->back()->with('fm.archive', $message);
    }

    public function folder(Request $request)
    {
        $userId = auth()->id();
        $folderId = $request->input('folder_id', '');
        $folder = Folder::where('user_id', '=', $userId)->findOrFail($folderId);

        $folder->update([
            'parent_folder' => null,
            'is_archived' => !$folder->is_archived,
            'is_favorited' => false
        ]);

        $this->nestedArchiveNotes($folder);
        $this->nestedArchiveFolders($folder->is_archived, $folder->children);

        $message = 'Archive item successfully!';
        if (!$folder->is_archived) {
            $message = 'Unarchive item successfully!';
        }

        return redirect()->back()->with('fm.favorite', $message);
    }

    private function nestedArchiveFolders(Bool $parentStatus, Collection $children)
    {
        foreach ($children as $child) {
            $child->update([
                'is_archived' => $parentStatus,
                'is_favorited' => false
            ]);

            $this->nestedArchiveNotes($child);
            $this->nestedArchiveFolders($child->is_favorited, $child->children);
        }
    }

    private function nestedArchiveNotes(Folder $folder)
    {
        foreach ($folder->notes as $note) {
            $note->update([
                'is_archived' => $folder->is_archived,
                'is_favorited' => false
            ]);
        }
    }
}
