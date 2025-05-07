@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-4">{{ $shelf->name }}</h1>

    <!-- Show Shelf Creator -->
    @if (!auth()->check() || auth()->id() !== $shelf->user_id)
        <p class="text-sm text-gray-500 mb-4">Created by: <strong>{{ $shelf->user->name }}</strong></p>
    @endif

    <!-- Button Container -->
    @auth
        @if (auth()->id() === $shelf->user_id)
            <div class="flex items-center space-x-4 mb-6">
                <!-- Add Album Button -->
                <a href="{{ route('albums.search', $shelf) }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
                    + Add Album
                </a>

                <!-- Rename Shelf Button -->
                <a href="{{ route('shelves.edit', $shelf) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow text-sm">
                    Rename Shelf
                </a>

                <!-- Delete Shelf Button -->
                <form action="{{ route('shelves.destroy', $shelf) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow text-sm">
                        Delete Shelf
                    </button>
                </form>
            </div>
        @endif
    @endauth

    @if ($albums->isEmpty())
        <p class="text-gray-600">No albums found in this shelf.</p>
    @else
        <ul class="space-y-4">
            @foreach ($albums as $album)
                <li class="bg-white p-4 rounded shadow flex items-center">
                    <!-- Album Art -->
                    <img src="{{ $album->api_id ? 'https://coverartarchive.org/release/' . $album->api_id . '/front' : asset('images/placeholder.png') }}" 
                         alt="{{ $album->title }}" 
                         class="w-24 h-24 object-cover rounded-md mr-4" />

                    <!-- Album Details -->
                    <div class="flex-1">
                        <strong class="text-lg">{{ $album->title }}</strong>
                        <p class="text-sm text-gray-600">by {{ $album->artist }}</p>
                        <p class="text-sm text-gray-500">Release Year: {{ $album->release_year ?? 'Unknown' }}</p>
                        <p class="text-sm text-gray-500">Format: {{ $album->format }}</p>
                    </div>

                    <!-- Remove Album Button -->
                    @auth
                        @if (auth()->id() === $shelf->user_id)
                            <form action="{{ route('albums.destroy', [$shelf, $album]) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow text-sm">
                                    Remove
                                </button>
                            </form>
                        @endif
                    @endauth
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection