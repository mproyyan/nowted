<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $notes = Note::root()->favorited()->get();
        $folders =  Folder::root()->favorited()->get();

        return view('favorite', [
            'notes' => $notes,
            'folders' => $folders
        ]);
    }

    public function note(Request $request)
    {
        $noteId = $request->input('note_id', '');
        $note = Note::findOrFail($noteId);

        $note->is_favorited = !$note->is_favorited;
        $note->save();

        $message = 'The item was successfully added to the favorites list!';
        if (!$note->is_favorited) {
            $message = 'The item was successfully removed from the favorites list';
        }

        return redirect()->back()->with('fm.favorite', $message);
    }

    public function folder(Request $request)
    {
        $folderId = $request->input('folder_id', '');
        $folder = Folder::findOrFail($folderId);

        $folder->is_favorited = !$folder->is_favorited;
        $folder->save();

        $this->nestedFavoriteNotes($folder);
        $this->nestedFavoriteFolders($folder->is_favorited, $folder->children);

        $message = 'The item was successfully added to the favorites list!';
        if (!$folder->is_favorited) {
            $message = 'The item was successfully removed from the favorites list';
        }

        return redirect()->back()->with('fm.favorite', $message);
    }

    private function nestedFavoriteFolders(Bool $parentStatus, Collection $children)
    {
        foreach ($children as $child) {
            $child->is_favorited = $parentStatus;
            $child->save();
            $this->nestedFavoriteNotes($child);
            $this->nestedFavoriteFolders($child->is_favorited, $child->children);
        }
    }

    private function nestedFavoriteNotes(Folder $folder)
    {
        foreach ($folder->notes as $note) {
            $note->is_favorited = $folder->is_favorited;
            $note->save();
        }
    }
}
