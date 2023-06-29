<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = auth()->id();
        $notes = Note::root()->where('user_id', '=', $userId)->get();
        $folders = Folder::root()->where('user_id', '=', $userId)->get();
        $folderIds = Folder::where('is_archived', '=', false)
            ->where('user_id', '=', $userId)
            ->get(['id', 'name', 'parent_folder']);

        return view("main", [
            'notes' => $notes,
            'folders' => $folders,
            'folderIds' => $folderIds,
        ]);
    }
}
