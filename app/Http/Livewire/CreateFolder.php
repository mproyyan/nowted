<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Livewire\Component;

class CreateFolder extends Component
{
    public $name = null;
    public $parent = null;
    public $currentFolder = null;
    public $folders;

    public function render()
    {
        $folders = Folder::where('name', '=', $this->name)
            ->where('parent_folder', '=', $this->parent)
            ->where('is_archived', '=', false)
            ->get();

        return view('livewire.create-folder', [
            'empty' => $this->name === null || $this->name === '' ? true : false,
            'exists' => $folders->count() > 0 ?? false,
        ]);
    }
}
