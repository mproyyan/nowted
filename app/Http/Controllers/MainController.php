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
        $notes = Note::root()->get();
        $folders = Folder::root()->get();
        $folderIds = Folder::where('is_archived', '=', false)->get(['id', 'name', 'parent_folder']);

        return view("main", [
            'notes' => $notes,
            'folders' => $folders,
            'folderIds' => $folderIds,
        ]);
    }
}
