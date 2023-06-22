@extends('index')

@section('content')
  <div class="px-4">
    <!-- Page Title -->
    <h2 class="text-xl font-semibold text-white sm:text-3xl">Trash</h2>
    <!-- action button -->
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
                <!-- note recover action -->
                <li>
                  <form class="block" action="{{ route('trash.note') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99">
                        </path>
                      </svg>
                      <span>Recover</span>
                    </button>
                  </form>
                </li>

                <!-- note delete action button -->
                <li x-data="{ open: false }">
                  <button @click="open = !open" type="submit" class="flex w-full items-center">
                    <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                      </path>
                    </svg>
                    <span>Delete Permanently</span>
                  </button>
                  <!-- modal for delete note -->
                  <template x-teleport="body">
                    <x-modal :url="route('trash.note.permanent')" title="Delete Note" confirm="Delete">
                      @method('DELETE')
                      @csrf
                      <input type="hidden" name="note_id" value="{{ $note->id }}">
                      <svg class="mx-auto mt-2 w-20 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z">
                        </path>
                      </svg>
                      <h4 class="mt-2 text-center text-lg text-gray-300">Are you sure that you want to permanently delete <span class="font-semibold text-white">{{ $note->title }}</span>?</h4>
                      <p class="mt-2 text-center text-sm text-gray-400">If you delete a note, the note will be lost permanently</p>
                    </x-modal>
                  </template>
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
                <!-- folder recover button -->
                <li>
                  <form class="block" action="{{ route('trash.folder') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99">
                        </path>
                      </svg>
                      <span>Recover</span>
                    </button>
                  </form>
                </li>

                <!-- folder delete action button -->
                <li x-data="{ open: false }">
                  <button @click="open = !open" type="submit" class="flex w-full items-center">
                    <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                      </path>
                    </svg>
                    <span>Delete Permanently</span>
                  </button>
                  <!-- modal for delete note -->
                  <template x-teleport="body">
                    <x-modal :url="route('trash.folder.permanent')" title="Delete Folder" confirm="Delete">
                      @method('DELETE')
                      @csrf
                      <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                      <svg class="mx-auto mt-2 w-20 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z">
                        </path>
                      </svg>
                      <h4 class="mt-2 text-center text-lg text-gray-300">Are you sure that you want to permanently delete <span class="font-semibold text-white">{{ $folder->name }}</span>?</h4>
                      <p class="mt-2 text-center text-sm text-gray-400">If you delete a folder the folder will be lost permanently including all the files in it</p>
                    </x-modal>
                  </template>
                </li>
              </ul>
            </x-folder>
          @endforeach
        </div>
      </div>
    @else
      <x-info title="Trash empty" subtitle="When you delete an item it will not disappear until you delete it permanently or choose to restore it">
        <svg class="mx-auto w-20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
          </path>
        </svg>
      </x-info>
    @endif
  </div>

  @if (session('fm'))
    <template x-data x-teleport="#container">
      <div class="fixed top-4 right-0 space-x-2 px-4">
        @if (session('fm.trash'))
          <x-toast type="success" :message="session('fm.trash')" />
        @endif
      </div>
    </template>
  @endif
@endsection
