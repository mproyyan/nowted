<div x-show="open">
  <div @click.self="open = false" class="fixed inset-0 flex items-center justify-center bg-black/50 p-2 sm:p-0">
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
      class="bg-gactive max-w-sm grow rounded-md p-2 sm:p-4">
      <!-- header -->
      <div class="flex items-center justify-between">
        <h4 class="font-semibold text-white sm:text-xl">{{ $title }}</h4>
        <div @click="open = false" class="hover:bg-secondary group w-fit rounded-full p-0.5 transition-all">
          <svg class="w-5 text-slate-400 transition-all group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </div>
      </div>
      <!-- content -->
      <form action="{{ $url }}" method="post">
        <div>
          {{ $slot }}
        </div>
        <!-- action button -->
        <div class="mt-4 flex space-x-1">
          <button @click="open = false" type="button" class="bg-secondary group grow rounded-md px-2 py-1 transition-all hover:bg-red-500">
            <span class="text-sm text-slate-400 transition-all group-hover:text-white">Cancel</span>
          </button>
          <button type="submit" class="bg-secondary hover:bg-bactive group grow rounded-md px-2 py-1 transition-all">
            <span class="text-sm text-slate-400 transition-all group-hover:text-white">{{ $confirm }}</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
