@extends('index')

@section('content')
  <div class="mt-3 px-4">
    <h3 class="mb-6 text-xl font-semibold text-white md:text-3xl">Create New Note</h3>
    <form action="{{ route('note.insert') }}" method="post" class="w-full">
      @csrf
      <div class="w-full space-y-8 sm:space-y-5">
        <!-- title field -->
        <div class="relative sm:grid sm:grid-cols-5 sm:items-center">
          <div class="sm:col-start-2 sm:col-end-6">
            <input id="title" name="title" type="text" placeholder=" " value="{{ old('title') ?? null }}"
              class="border-tertiary peer w-full border-b-2 bg-transparent py-1 tracking-wide text-white outline-none transition-all focus:border-white" />
            @error('title')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div
            class="absolute -top-4 left-0 origin-[0] scale-75 text-slate-400 transition-all peer-placeholder-shown:top-0 peer-placeholder-shown:scale-100 peer-focus:-top-4 peer-focus:scale-75 peer-focus:text-white sm:static sm:col-start-1 sm:row-start-1 sm:scale-100 sm:peer-focus:scale-100 md:flex md:items-center md:space-x-1">
            <svg class="hidden w-5 md:block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802">
              </path>
            </svg>
            <label for="title" class="md:font-semibold">Title</label>
          </div>
        </div>
        <!-- folder field -->
        <div class="relative sm:grid sm:grid-cols-5 sm:items-center">
          <div class="sm:col-start-2 sm:col-end-6">
            <select name="folder_id" id="folder" class="border-tertiary bg-tertiary peer w-full rounded-md border-2 py-1 text-white outline-none transition-all focus:border-white">
              <option value="{{ null }}">Root</option>
              @foreach ($folders as $folder)
                <option {{ $parent === $folder->id ? 'selected' : '' }} value="{{ $folder->id }}">{{ $folder->name }}</option>
              @endforeach
            </select>
            @error('folder_id')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div
            class="absolute -top-6 left-0 origin-[0] scale-75 text-slate-400 transition-all peer-focus:text-white sm:static sm:col-start-1 sm:row-start-1 sm:scale-100 md:flex md:items-center md:space-x-1">
            <svg class="hidden w-5 md:block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
              </path>
            </svg>
            <label for="folder" class="md:font-semibold">Folder</label>
          </div>
        </div>
        <!-- date field -->
        <div class="relative w-full sm:grid sm:grid-cols-5">
          <div class="sm:col-start-2 sm:col-end-6">
            <input name="created_at" type="date" id="date" value="{{ old('created_at' ?? now()->format('m/d/Y')) }}"
              class="border-tertiary bg-tertiary peer w-full rounded-md border-2 bg-transparent p-1 text-white outline-none transition-all focus:border-white" />
            @error('created_at')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div
            class="absolute -top-6 left-0 origin-[0] scale-75 text-slate-400 transition-all peer-focus:text-white sm:static sm:col-start-1 sm:row-start-1 sm:scale-100 md:flex md:items-center md:space-x-1">
            <svg class="hidden w-5 md:block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
              </path>
            </svg>
            <label for="date" class="md:font-semibold">Date</label>
          </div>
        </div>
        <!-- ckeditor -->
        <textarea name="content" id="ckeditor-input" cols="30" rows="10" class="prose max-w-none">
          {!! old('content') ?? null !!}
        </textarea>
      </div>
      <button type="submit" class="bg-bactive mx-auto mt-8 w-full rounded-md p-2 text-white sm:w-fit sm:px-5">
        <span>Create Note</span>
      </button>
    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endpush
