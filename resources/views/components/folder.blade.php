<div x-data="{ open: false }" class="bg-secondary rounded-lg px-4 py-2">
  <div class="flex items-start justify-between">
    <div class="flex items-start">
      <svg class="mr-2 w-6 shrink-0 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
        </path>
      </svg>
      <a href="{{ route('folder.detail', ['id' => $id]) }}">
        <h4 class="font-semibold text-white">{{ $name }}</h4>
      </a>
    </div>
    <!-- menu -->
    <div @click="open = !open" class="hover:bg-gactive relative rounded-full p-0.5">
      <svg class="w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
        </path>
      </svg>
      <div x-show="open" x-cloak @click.outside="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="bg-gactive absolute right-7 top-1/2 w-48 -translate-y-1/2 rounded-md px-4 py-2 text-sm text-white">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
