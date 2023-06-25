<div>
  <div class="relative mt-2">
    <input wire:model.debounce.500ms="name" type="text" id="folder_update_{{ $currentFolder ? $currentFolder->id : '' }}" name="folder" placeholder=" "
      value="{{ $currentFolder ? $currentFolder->name : null }}"
      class="peer w-full rounded-md border border-gray-400 bg-transparent p-1 tracking-wide text-white outline-none transition-all focus:border-white" />
    <label for="folder_update_{{ $currentFolder ? $currentFolder->id : '' }}"
      class="bg-gactive peer-focus:bg-gactive absolute -top-3 left-2 origin-[0] scale-75 px-2 text-gray-400 transition-all peer-placeholder-shown:left-0 peer-placeholder-shown:top-1.5 peer-placeholder-shown:scale-100 peer-placeholder-shown:bg-transparent peer-placeholder-shown:text-gray-400 peer-focus:-top-3 peer-focus:left-2 peer-focus:scale-75 peer-focus:text-white">Folder
      Name</label>
    @if (!$empty)
      @if ($exists)
        <span class="mt-0.5 text-sm text-red-400">Folder with that name already exists</span>
      @else
        <span class="mt-0.5 text-sm text-green-400">Folder name can be use</span>
      @endif
    @endif
  </div>
  <div class="mt-2 flex flex-col-reverse">
    <select wire:model="parent" name="parent_folder" id="parent_folder_{{ $currentFolder ? $currentFolder->id : '' }}"
      class="border-tertiary bg-tertiary peer peer w-full rounded-md border-2 py-1 text-white outline-none transition-all focus:border-white sm:col-start-2 sm:col-end-6">
      <option value="{{ null }}">Root</option>
      @foreach ($folders as $folder)
        @if (($currentFolder ? $currentFolder->id : null) !== $folder->id)
          @if (($currentFolder ? $currentFolder->id : null) !== $folder->parent_folder)
            <option {{ ($currentFolder ? $currentFolder->parent_folder : null) === $folder->id ? 'selected' : '' }} value="{{ $folder->id }}">{{ $folder->name }}</option>
          @endif
        @endif
      @endforeach
    </select>
    <label for="parent_folder_{{ $currentFolder ? $currentFolder->id : '' }}" class="mb-1 text-xs text-gray-400 peer-focus:text-white">Parent Folder</label>
  </div>
</div>
