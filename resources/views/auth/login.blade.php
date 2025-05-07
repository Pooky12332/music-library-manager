@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold mb-6 text-center">Login</h1>

    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black @error('email') border-red-500 @enderror">
            @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black @error('password') border-red-500 @enderror">
            @error('password')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mb-4">
            <label class="inline-flex items-center text-sm text-gray-700">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox text-black"
                       {{ old('remember') ? 'checked' : '' }}>
                <span class="ml-2">Remember Me</span>
            </label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-black hover:underline">Forgot Your Password?</a>
            @endif
        </div>

        <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">
            Login
        </button>

        @if (Route::has('register'))
        <p class="text-center text-sm text-gray-700 mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-black hover:underline">Register</a>
        </p>
        @endif
    </form>
</div>
@endsection
