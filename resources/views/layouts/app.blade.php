<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Posty</title>
</head>
<body class="bg-gray-100 h-full">
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="hidden md:block">
            <div class=" -ml-3 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
              <a href="{{route('dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
              <a href="{{route('posts')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Posts</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            {{-- @if(auth()->user())
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{auth()->user()}}</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Logout</a>
            
            @else
                <a href="#" class="text-graygray-700 blue:text-2hite block rounded-md px-3 py-2 text-base font-medium bg-blue-300 text-black">Login</a>
                <a href="{{ route('register') }}" class="hover:bg-blue-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium bg-blue-900 text-white">Register</a>
            
            @endif --}}

            @auth
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{auth()->user()->name}}</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Logout</button>
                
                </form>
            @endauth

            @guest
                <a href="{{route('login')}}" class="hover:bg-blue-200 hover:text-black 2lock rounded-md px-3 py-2 text-base font-medium bg-blue-300 text-black">Login</a>
                <a href="{{ route('register') }}" class="hover:bg-blue-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium bg-blue-900 text-white ml-2">Register</a>
            @endguest

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Home</a>
        <a href="{{route('dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Dashboard</a>
        <a href="{{route('posts')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Posts</a>


        {{-- Mobile Menu Structure --}}

        {{-- @if (auth()->check())
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{auth()->user()}}</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Logout</a>
        @else
            <a href="#" 300 hover:blue-gray-700 hover:text-2hite block rounded-md px-3 py-2 text-base font-medium bg-blue-300 text-black">Login</a>
            <a href="{{ route('register') }}" class="hover:bg-blue-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium bg-blue-900 text-white">Register</a>
        @endif --}}

        @auth
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{auth()->user()->name}}</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium w-full text-left">Logout</button>
            
            </form>
        @endauth

        @guest
            <a href="{{route('login')}}" class="hover:bg-slate-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium text-white">Login</a>
            <a href="{{ route('register') }}" class="hover:bg-slate-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium  text-white">Register</a>
        @endguest

      </div>
    </nav>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
  </main>
</div>

</body>
</html>