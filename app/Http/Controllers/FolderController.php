<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FolderController extends Controller
{
    public function create(Request $request)
    {
        $userId = auth()->id();
        $validator = Validator::make(['folder' => $request->input('folder')], [
            'folder' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('fm.folder-fail', 'Failed create folder, folder name required!');
        }

        $validator->validate();

        $name = $request->input('folder');
        $parentFolder = $request->input('parent_folder');
        $folders = Folder::where('name', '=', $name)
            ->where('user_id', '=', $userId)
            ->where('parent_folder', '=', $parentFolder)
            ->where('is_archived', '=', false)
            ->get('id');

        if ($folders->count() > 0) {
            return redirect()->back()->with('fm.folder-exists', 'Folder with that name already exists');
        }

        Folder::create([
            'name' => $request->input('folder'),
            'user_id' => $userId,
            'parent_folder' => $request->input('parent_folder')
        ]);

        return redirect()->back()->with('fm.folder-success', 'Folder created successfully');
    }

    public function update(Request $request)
    {
        $userId = auth()->id();
        $oldFolder = Folder::where('user_id', '=', $userId)->findOrFail($request->input('old_folder'));
        $validator = Validator::make(['folder' => $request->input('folder')], [
            'folder' => 'required'
        ]);

        if ($validator->fails()) {
            redirect()->back()->with('fm.folder-fail', 'Failed create folder, folder name required!');
        }

        $validator->validate();

        $name = $request->input('folder');
        $parentFolder = $request->input('parent_folder');
        if ($oldFolder->name === $name && $oldFolder->parent_folder === $parentFolder) {
            return redirect()->back();
        }

        $folder = Folder::where('name', '=', $name)
            ->where('user_id', '=', $userId)
            ->where('parent_folder', '=', $parentFolder)
            ->where('is_archived', '=', false)
            ->first('id');

        if (isset($folder)) {
            return redirect()->back()->with('fm.folder-exists', 'Folder with that name already exists');
        }

        $status = $oldFolder->update([
            'name' => $name,
            'parent_folder' => $parentFolder
        ]);

        if (!$status) {
            return redirect()->back()->with('fm.folder-fail', 'Something went wrong');
        }

        return redirect()->back()->with('fm.folder-success', 'Folder updated successfully');
    }

    public function view(Request $request, $id)
    {
        $userId = auth()->id();
        $folder = Folder::withTrashed()->where('user_id', '=', $userId)->findOrFail($id);
        $folderIds = Folder::withTrashed()->where('is_archived', '=', false)
            ->where('user_id', '=', $userId)
            ->get(['id', 'name', 'parent_folder']);

        return view('folder', [
            'currentFolder' => $folder,
            'folders' => $folder->children()->withTrashed()->get(),
            'notes' => $folder->notes()->withTrashed()->get(),
            'folderIds' => $folderIds
        ]);
    }
}
