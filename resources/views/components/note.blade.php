<div x-data="{ open: false }" class="bg-secondary rounded-lg px-4 py-2">
  <div class="flex items-start justify-between">
    <!-- rightside -->
    <div class="flex items-start">
      <svg class="mr-2 w-8 shrink-0 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
        </path>
      </svg>
      <div>
        <a href="{{ route('note.detail', ['id' => $note->id]) }}">
          <h4 class="font-semibold text-white">{{ $note->title }}</h4>
        </a>
        <span class="text-xs text-slate-400">{{ $note->created_at->format('d/m/Y') }}</span>
      </div>
    </div>
    <!-- leftside -->
    <div @click="open = !open" class="hover:bg-gactive relative rounded-full p-0.5">
      <svg class="w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
        </path>
      </svg>
      <!-- action menu -->
      <div x-show="open" x-cloak x-show @click.outside="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="bg-gactive absolute right-7 top-1/2 w-48 -translate-y-1/2 rounded-md px-4 py-2 text-sm text-white">
        {{ $slot }}
      </div>
    </div>
  </div>
  <p class="text-gtext mt-2 text-sm">{{ $note->getExcerpt() }}</p>
</div>
