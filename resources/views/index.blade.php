<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
  <title>Nowted</title>
</head>

<body class="bg-primary">
  <div class="mx-auto sm:max-w-2xl md:max-w-4xl lg:max-w-5xl">
    <!-- Header -->
    <section class="w-full">
      <div class="relative items-center justify-between px-4 py-2 sm:flex lg:py-4">
        <!-- heading -->
        <div class="bg-red flex justify-between">
          <h1 class="text-2xl font-bold italic text-white md:text-3xl">Nowted</h1>
          <svg class="w-8 text-white sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
          </svg>
        </div>
        <!-- sidebar -->
        <div class="bg-gactive sm:text-gtext absolute right-5 top-12 hidden w-fit rounded-md px-4 py-2 pr-10 text-sm text-white sm:static sm:block sm:bg-transparent sm:pr-0">
          <ul class="sm:flex">
            <a href="#" class="">
              <li class="mb-3 flex items-center sm:hover:text-white md:mr-12 md:font-semibold">
                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                  </path>
                </svg>
                <span>Favorites</span>
              </li>
            </a>
            <a href="#">
              <li class="mb-3 flex items-center sm:mb-0 sm:mr-8 sm:hover:text-white md:mr-12 md:font-semibold">
                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                  </path>
                </svg>
                <span>Archived Notes</span>
              </li>
            </a>
            <a href="#">
              <li class="flex items-center sm:hover:text-white md:font-semibold">
                <svg class="mr-2 w-5 sm:hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                  </path>
                </svg>
                <span>Trash</span>
              </li>
            </a>
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
</body>

</html>
