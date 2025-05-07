@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-4">My Shelves</h1>

    <!-- Create New Shelf Form -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Create New Shelf</h2>
        <form action="{{ route('shelves.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="shelfName" class="block text-sm font-medium text-gray-700">Shelf Name</label>
                <input type="text" id="shelfName" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-black hover:bg-gray-700 text-white px-4 py-2 rounded shadow text-sm">
                    Create
                </button>
            </div>
        </form>
    </div>

    <!-- Display Shelves -->
    @if ($shelves->count())
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach($shelves as $shelf)
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <!-- Shelf Name -->
                    <h3 class="text-xl font-semibold mb-4 text-center">
                        <a href="{{ route('shelves.show', $shelf) }}" class="text-black-600 hover:underline">
                            {{ $shelf->name }}
                        </a>
                    </h3>

                    <!-- Album Covers -->
                    <div class="grid grid-cols-5 gap-2">
                        @foreach($shelf->albums->take(5) as $album)
                            <img src="{{ $album->api_id ? 'https://coverartarchive.org/release/' . $album->api_id . '/front' : asset('images/placeholder.png') }}" 
                                 alt="{{ $album->title }}" 
                                 class="w-100% h-100% object-cover rounded-md">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">You haven’t created any shelves yet.</p>
    @endif
</div>
@endsection