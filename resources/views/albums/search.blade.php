@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Search for Albums</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('albums.search', $shelf) }}" class="mb-8">
        <!-- Album Name Input -->
        <div class="mb-4">
            <label for="query" class="block text-sm font-medium text-gray-700">Album Name</label>
            <input type="text" id="query" name="query" placeholder="Search for an album..." required 
                   value="{{ old('query', request('query')) }}" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Filters Row -->
        <div class="flex flex-wrap gap-4 mb-4">
            <!-- Artist Name Input -->
            <div class="flex-1">
                <label for="artist" class="block text-sm font-medium text-gray-700">Artist Name (Optional)</label>
                <input type="text" id="artist" name="artist" placeholder="Filter by artist..." 
                       value="{{ old('artist', request('artist')) }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Format Dropdown -->
            <div class="flex-1">
                <label for="format" class="block text-sm font-medium text-gray-700">Format (Optional)</label>
                <select id="format" name="format" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" {{ old('format', request('format')) == '' ? 'selected' : '' }}>None</option>
                    <option value="digitalmedia" {{ old('format', request('format')) == 'digitalmedia' ? 'selected' : '' }}>Digital</option>
                    <option value="cd" {{ old('format', request('format')) == 'cd' ? 'selected' : '' }}>CD</option>
                    <option value="12vinyl" {{ old('format', request('format')) == '12vinyl' ? 'selected' : '' }}>12" Vinyl</option>
                    <option value="7vinyl" {{ old('format', request('format')) == '7vinyl' ? 'selected' : '' }}>7" Vinyl</option>
                    <option value="cassette" {{ old('format', request('format')) == 'cassette' ? 'selected' : '' }}>Cassette</option>
                </select>
            </div>

            <!-- Country Code Input -->
            <div class="flex-1">
                <label for="country" class="block text-sm font-medium text-gray-700">Country Code (Optional)</label>
                <input type="text" id="country" name="country" placeholder="Enter ISO code (e.g., US, GB)" 
                       value="{{ old('country', request('country')) }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-black text-white px-4 py-2 rounded shadow">Search</button>
        </div>
    </form>

    @if(isset($results) && count($results) > 0)
        <h2 class="text-2xl font-semibold mb-4">Results</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($results as $album)
                <div class="bg-white p-4 rounded shadow">
                    <!-- Check if cover art exists -->
                    <img src="{{ isset($album['id']) ? 'https://coverartarchive.org/release/' . $album['id'] . '/front' : 'https://via.placeholder.com/300x300' }}" alt="{{ $album['title'] }}" class="w-full h-66 object-cover rounded-md mb-4" />
                    <strong>{{ $album['title'] }}</strong>
                    <p class="text-sm italic mb-3">by {{ $album['artist-credit'][0]['name'] ?? 'Unknown Artist' }}</p>
                    <p class="text-sm text-gray-500">Release date: {{ $album['date'] ?? 'Unknown Year' }}</p>
                    <p class="text-sm text-gray-500 mb-3">Country: {{ $album['country'] ?? 'Unknown Country' }}</p>
                    <p class="text-sm text-gray-500">Format: {{ $album['media'][0]['format'] ?? 'Unknown Format' }}</p>
                    <p class="text-sm text-gray-500">Label: {{ $album['label-info'][0]['label']['name'] ?? 'Unknown Label' }}</p>
                    <p class="text-sm text-gray-500">Catalog Code: {{ $album['label-info'][0]['catalog-number'] ?? 'Unknown Label' }}</p>
                    <form action="{{ route('albums.store', $shelf) }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="title" value="{{ $album['title'] }}">
                        <input type="hidden" name="artist" value="{{ $album['artist-credit'][0]['name'] ?? 'Unknown Artist' }}">
                        <input type="hidden" name="release_year" value="{{ isset($album['date']) ? substr($album['date'], 0, 4) : null }}">
                        <input type="hidden" name="format" value="{{ $album['media'][0]['format'] ?? 'Unknown Format' }}">
                        <input type="hidden" name="api_id" value="{{ $album['id'] }}">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
                            Add to Shelf
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No results found. Try searching for something else.</p>
    @endif
</div>
@endsection