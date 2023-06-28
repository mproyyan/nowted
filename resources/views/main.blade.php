@extends('index')

@section('content')
  <div class="px-4">
    <!-- Page Title -->
    <h2 class="text-xl font-semibold text-white sm:text-3xl">My Notes</h2>
    <!-- action button -->
    <div x-data="{ open: false }" class="mt-2 flex">
      <button @click="open = !open" class="bg-bactive mr-2 flex items-center rounded-md px-2 py-1 text-white">
        <svg class="mr-1.5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
          </path>
        </svg>
        <span class="text-sm">New Folder</span>
      </button>
      <a href="{{ route('note.create') }}" class="bg-bactive flex items-center rounded-md px-2 py-1 text-white">
        <svg class="mr-1.5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
          </path>
        </svg>
        <span class="text-sm">New Note</span>
      </a>
      <!-- modal for create new folder -->
      <x-modal :url="route('folder.create')" title="Create New Folder" confirm="Create">
        @csrf
        <svg fill="none" class="mx-auto mt-2 w-20 text-white" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
          </path>
        </svg>
        <livewire:create-folder :folders="$folderIds" />
      </x-modal>
    </div>
    @if ($folders->count() > 0 || $notes->count() > 0)
      <!-- Notes -->
      <div class="mt-8">
        <h3 class="text-gtext">Notes</h3>
        <div class="mt-2 space-y-3 sm:grid sm:grid-cols-2 sm:gap-2 sm:space-y-0 md:grid-cols-3">
          <!-- note -->
          @foreach ($notes as $note)
            <x-note :note="$note">
              <!-- action menu -->
              <ul class="space-y-3">
                <!-- note add to favorite -->
                <li>
                  <form class="block" action="{{ route('favorites.note') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                        </path>
                      </svg>
                      <span>{{ $note->is_favorited ? 'Unfavorite' : 'Add to Favorite' }}</span>
                    </button>
                  </form>
                </li>

                <!-- note edit button -->
                <a href="{{ route('note.edit', ['id' => $note->id]) }}" class="block">
                  <li class="flex items-center">
                    <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                      </path>
                    </svg>
                    <span>Edit</span>
                  </li>
                </a>

                <!-- note archive action -->
                <li>
                  <form class="block" action="{{ route('archives.note') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                        </path>
                      </svg>
                      <span>Archive</span>
                    </button>
                  </form>
                </li>

                <!-- note delete action button -->
                <li>
                  <form class="block" action="{{ route('trash.note') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                        </path>
                      </svg>
                      <span>Delete</span>
                    </button>
                  </form>
                </li>
              </ul>
            </x-note>
          @endforeach
        </div>
      </div>
      <!-- Folders -->
      <div class="mt-5">
        <h3 class="text-gtext">Folders</h3>
        <div class="mt-2 space-y-3 sm:grid sm:grid-cols-2 sm:gap-2 sm:space-y-0 md:grid-cols-3 lg:grid-cols-4">
          <!-- folder -->
          @foreach ($folders as $folder)
            <x-folder :id="$folder->id" :name="$folder->name">
              <ul class="space-y-3">
                <!-- add folder to favorite -->
                <li>
                  <form class="block" action="{{ route('favorites.folder') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                        </path>
                      </svg>
                      <span>{{ $folder->is_favorited ? 'Unfavorite' : 'Add to Favorite' }}</span>
                    </button>
                  </form>
                </li>

                <!-- folder edit button -->
                <li x-data="{ open: false }">
                  <button @click="open = !open" type="submit" class="flex w-full items-center">
                    <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                      </path>
                    </svg>
                    <span>Edit</span>
                  </button>
                  <!-- modal for edit folder -->
                  <template x-teleport="body">
                    <x-modal :url="route('folder.update')" title="Edit Folder" confirm="Save Changes">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="old_folder" value="{{ $folder->id }}">
                      <svg fill="none" class="mx-auto mt-2 w-20 text-white" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
                        </path>
                      </svg>
                      <livewire:update-folder :folders="$folderIds" :currentFolder="$folder" />
                    </x-modal>
                  </template>
                </li>

                <!-- folder archive action -->
                <li>
                  <form class="block" action="{{ route('archives.folder') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                        </path>
                      </svg>
                      <span>Archive</span>
                    </button>
                  </form>
                </li>

                <!-- folder delete action button -->
                <li>
                  <form class="block" action="{{ route('trash.folder') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                        </path>
                      </svg>
                      <span>Delete</span>
                    </button>
                  </form>
                </li>
              </ul>
            </x-folder>
          @endforeach
        </div>
      </div>
    @else
      <x-info title="You dont have any note or folder" subtitle="Try creating a new note or folder by clicking the blue button above">
        <svg class="mx-auto w-20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
          </path>
        </svg>
      </x-info>
    @endif
  </div>

  @if (session('fm'))
    <template x-data x-teleport="#container">
      <div class="fixed top-4 right-0 space-x-2 px-4">
        @if (session('fm.favorite'))
          <x-toast type="success" :message="session('fm.favorite')" />
        @endif
        @if (session('fm.archive'))
          <x-toast type="success" :message="session('fm.archive')" />
        @endif
        @if (session('fm.trash'))
          <x-toast type="success" :message="session('fm.trash')" />
        @endif
        @if (session('fm.folder-success'))
          <x-toast type="success" :message="session('fm.folder-success')" />
        @endif
        @if (session('fm.folder-fail'))
          <x-toast type="failed" :message="session('fm.folder-fail')" />
        @endif
        @if (session('fm.folder-exists'))
          <x-toast type="failed" :message="session('fm.folder-exists')" />
        @endif
      </div>
    </template>
  @endif
@endsection
