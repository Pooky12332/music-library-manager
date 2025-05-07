@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold mb-6 text-center">Register</h1>

    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black @error('name') border-red-500 @enderror">
            @error('name')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black @error('email') border-red-500 @enderror">
            @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black @error('password') border-red-500 @enderror">
            @error('password')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black">
        </div>

        <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">
            Register
        </button>

        <p class="text-center text-sm text-gray-700 mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-black hover:underline">Login</a>
        </p>
    </form>
</div>
@endsection
