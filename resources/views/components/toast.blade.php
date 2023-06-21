<div x-data="{ open: true }" x-show="open" x-init="() => { setTimeout(() => open = false, 3000) }" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-50"
  class="flex w-full max-w-sm items-center space-x-3 rounded-lg bg-gray-800 p-4 text-gray-300">
  @if ($type === 'success')
    <div class="h-8 w-8 flex-shrink-0 rounded-lg bg-green-800 p-0.5 text-green-200">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
    </div>
  @elseif ($type === 'failed')
    <div class="h-8 w-8 flex-shrink-0 rounded-lg bg-red-800 p-0.5 text-red-200">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
    </div>
  @elseif ($type === 'warning')
    <div class="h-8 w-8 flex-shrink-0 rounded-lg bg-yellow-800 p-0.5 text-yellow-200">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"></path>
      </svg>
    </div>
  @else
    <div class="h-8 w-8 flex-shrink-0 rounded-lg bg-blue-800 p-0.5 text-blue-200">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
        </path>
      </svg>
    </div>
  @endif
  <div class="text-sm font-normal">{{ $message }}</div>
  <button @click="open = false" type="button"
    class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-gray-800 p-1.5 text-gray-500 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-gray-300">
    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
  </button>
</div>
