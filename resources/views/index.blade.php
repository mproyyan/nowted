<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
    <title>Nowted</title>
</head>

<body class="bg-primary">
    <div id="container" class="relative mx-auto sm:max-w-2xl md:max-w-4xl lg:max-w-5xl">
        <!-- Header -->
        <section class="w-full">
            <div x-data="{ open: window.innerWidth >= 640 }" @resize.window="open = window.innerWidth >= 640"
                class="relative items-center justify-between px-4 py-2 sm:flex lg:py-4">
                <!-- heading -->
                <div class="bg-red flex justify-between">
                    <h1 class="text-2xl font-bold italic text-white md:text-3xl">
                        <a href="{{ route('main') }}">Nowted</a>
                    </h1>
                    <svg @click="open = !open" class="w-8 text-white sm:hidden" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </div>
                <!-- sidebar -->
                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="bg-gactive sm:text-gtext absolute right-5 top-12 z-40 w-fit rounded-md px-4 py-2 pr-10 text-sm text-white sm:static sm:block sm:bg-transparent sm:pr-0">
                    <ul class="space-y-3 sm:flex sm:space-y-0 sm:space-x-8 md:space-x-12">
                        <a href="{{ route('favorites') }}" class="block">
                            <li
                                class="{{ request()->is('favorites') ? 'text-white' : '' }} flex items-center sm:hover:text-white md:font-semibold">
                                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                    </path>
                                </svg>
                                <span>Favorites</span>
                            </li>
                        </a>
                        <a href="{{ route('archives') }}" class="block">
                            <li
                                class="{{ request()->is('archives') ? 'text-white' : '' }} flex items-center sm:hover:text-white md:font-semibold">
                                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                                    </path>
                                </svg>
                                <span>Archives</span>
                            </li>
                        </a>
                        <a href="{{ route('trash') }}" class="block">
                            <li
                                class="{{ request()->is('trash') ? 'text-white' : '' }} flex items-center sm:hover:text-white md:font-semibold">
                                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                    </path>
                                </svg>
                                <span>Trash</span>
                            </li>
                        </a>
                        @auth
                            <li x-data="{ open: false }" @click="open = !open"
                                class="flex cursor-pointer items-center sm:hover:text-white md:font-semibold">
                                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75">
                                    </path>
                                </svg>
                                <span>Logout</span>
                                <template x-teleport="body">
                                    <x-modal :url="route('logout')" title="Logout From Account" confirm="Logout">
                                        @csrf
                                        <svg class="mx-auto mt-2 w-20 text-white" fill="none" stroke="currentColor"
                                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z">
                                            </path>
                                        </svg>
                                        <h4 class="mt-2 text-center text-lg text-gray-300">Are you sure that you want to
                                            <span class="text-white font-semibold">logout</span>?
                                        </h4>
                                        <p class="mt-2 text-center text-sm text-gray-400">Once you log out, you will be
                                            asked to fill in your credentials again when accessing a restricted page</p>
                                    </x-modal>
                                </template>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </section>

        <!-- main -->
        <section class="mt-5 w-full">
            @yield('content')
        </section>

        <!-- margin helper -->
        <div class="mt-10"></div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>

</html>
