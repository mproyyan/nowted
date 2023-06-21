@extends('index')

@section('content')
  <div class="px-4">
    <!-- Page Title -->
    <h2 class="text-xl font-semibold text-white sm:text-3xl">Favorited</h2>
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
                <!-- remove from favorite -->
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
                      <span>Unfavorite</span>
                    </button>
                  </form>
                </li>

                <!-- edit button -->
                <a href="#" class="block">
                  <li class="flex items-center">
                    <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                      </path>
                    </svg>
                    <span>Edit</span>
                  </li>
                </a>

                <!-- archive action -->
                <li>
                  <form class="block" action="/favourites/note" method="post">
                    @method('PATCH')
                    @csrf
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

                <!-- delete action button -->
                <li>
                  <form class="block" action="/favourites/note" method="post">
                    @method('DELETE')
                    @csrf
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
                <!-- add to favorite -->
                <li>
                  <form class="block" action="/favourites/note" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" value="$folder->id">
                    <button type="submit" class="flex w-full items-center">
                      <svg class="mr-2 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                        </path>
                      </svg>
                      <span>Unfavorite</span>
                    </button>
                  </form>
                </li>

                <!-- edit button -->
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
                    <x-modal url="/folder" title="Rename Folder" confirm="Rename">
                      <svg fill="none" class="mx-auto mt-2 w-20 text-white" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
                        </path>
                      </svg>
                      <div class="relative mt-2">
                        <input type="text" id="folder_rename_{{ $folder->id }}" name="folder" value="{{ $folder->name }}" placeholder=" "
                          class="peer w-full rounded-md border border-gray-400 bg-transparent p-1 tracking-wide text-white outline-none transition-all focus:border-white" />
                        <label for="folder_rename_{{ $folder->id }}"
                          class="bg-gactive peer-focus:bg-gactive absolute -top-3 left-2 origin-[0] scale-75 px-2 text-gray-400 transition-all peer-placeholder-shown:left-0 peer-placeholder-shown:top-1.5 peer-placeholder-shown:scale-100 peer-placeholder-shown:bg-transparent peer-placeholder-shown:text-gray-400 peer-focus:-top-3 peer-focus:left-2 peer-focus:scale-75 peer-focus:text-white">Folder
                          Name</label>
                        <span class="mt-0.5 hidden text-sm text-gray-400">Checking folder name...</span>
                      </div>
                    </x-modal>
                  </template>
                </li>

                <!-- archive action -->
                <li>
                  <form class="block" action="/favourites/note" method="post">
                    @method('PATCH')
                    @csrf
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

                <!-- delete action button -->
                <li>
                  <form class="block" action="/favourites/note" method="post">
                    @method('DELETE')
                    @csrf
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
      <x-info title="You dont have any favorited note or folder" subtitle="You can favorite a folder or note to make it easier to search">
        <svg class="mx-auto w-20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
          </path>
        </svg>
      </x-info>
    @endif
  </div>
@endsection
