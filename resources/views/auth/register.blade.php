{{-- @extends('layouts/app') --}}
@extends('layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Register</h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
         <div class="bg-white p-6 rounded-lg w-1/2">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-400 @enderror" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-400 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">User name</label>
                    <input type="text" name="username" id="username" placeholder="User name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-400 @enderror" value="{{old('username')}}">
                    @error('username')
                        <div class="text-red-400 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-400 @enderror" value="{{old('email')}}">
                    @error('email')
                        <div class="text-red-400 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-400 @enderror" value="{{old('password')}}">
                    @error('password')
                        <div class="text-red-400 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-400 @enderror" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <div class="text-red-400 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection