<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
  <title>Login</title>
</head>

<body class="bg-primary h-screen">
  <div class="flex h-screen w-full items-center justify-center">
    <div class="max-w-sm grow">
      <h1 class="mb-4 text-center text-4xl font-bold italic text-white">
        <a href="{{ route('main') }}">Nowted</a>
      </h1>
      <div class="px-4 sm:px-0">
        <div class="bg-secondary max-w-sm grow rounded-lg p-4 sm:p-6">
          <h1 class="text-lg font-bold text-white sm:text-xl">Login <span class="hidden sm:inline-block">to Your Account</span></h1>
          <form action="{{ route('login.auth') }}" method="post" class="mt-5 space-y-4">
            @csrf
            <div class="relative w-full">
              <input type="text" name="email" placeholder=" " id="email" value="{{ old('email') }}"
                class="peer w-full border-b-2 border-slate-600 bg-transparent py-1 tracking-wide text-white outline-none transition-all invalid:text-red-500 focus:border-white" />
              @error('email')
                <span class="mt-0.5 text-xs text-red-500">{{ $message }}</span>
              @enderror
              <label for="email"
                class="absolute -top-4 left-0 origin-[0] scale-75 text-slate-600 transition-all peer-placeholder-shown:top-0 peer-placeholder-shown:scale-100 peer-focus:-top-4 peer-focus:scale-75 peer-focus:text-white">Email</label>
            </div>
            <div class="relative w-full">
              <input type="password" name="password" placeholder=" " id="password" value="{{ old('password') }}"
                class="peer w-full border-b-2 border-slate-600 bg-transparent py-1 tracking-wide text-white outline-none transition-all invalid:text-red-500 focus:border-white" />
              @error('password')
                <span class="mt-0.5 text-xs text-red-500">{{ $message }}</span>
              @enderror
              <label for="password"
                class="absolute -top-4 left-0 origin-[0] scale-75 text-slate-600 transition-all peer-placeholder-shown:top-0 peer-placeholder-shown:scale-100 peer-focus:-top-4 peer-focus:scale-75 peer-focus:text-white">Password</label>
            </div>
            <div class="w-full sm:flex sm:items-center sm:justify-between">
              <div class="flex items-center space-x-1.5">
                <input type="checkbox" id="remember" value="1" name="remember" class="accent-bactive peer h-4 w-4" />
                <label for="remember" class="text-sm text-slate-600 peer-checked:text-white">Remember me</label>
              </div>
              <p class="mt-2 text-sm text-slate-600 sm:mt-0">Forgot password? <a href="#" class="text-bactive font-semibold transition-all hover:text-blue-500">Reset</a></p>
            </div>
            <div>
              <button type="submit" class="bg-bactive w-full rounded-md py-1">
                <span class="font-semibold text-white">Login</span>
              </button>
              <p class="mt-1.5 text-center text-sm text-slate-600">Doesnt have an account? <a href="{{ route('register') }}" class="font-semibold text-bactive transition-all hover:text-blue-500">Register</a></a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
