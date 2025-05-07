@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Explore Shelves</h1>

    @if ($shelves->isEmpty())
        <p class="text-gray-600">No shelves created by other users yet.</p>
    @else
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach ($shelves as $shelf)
                <div class="card bg-white p-3 rounded shadow">
                    <div class="card-header">
                        <a href="{{ route('shelves.show', $shelf) }}">{{ $shelf->name }}</a>
                    </div>
                    <div class="card-body">
                        <p class="text-sm text-gray-500">Created by: {{ $shelf->user->name }}</p>
                        <div class="grid grid-cols-5 gap-2 mt-4">
                            @foreach ($shelf->albums->take(5) as $album)
                                <img src="{{ $album->api_id ? 'https://coverartarchive.org/release/' . $album->api_id . '/front' : asset('images/placeholder.png') }}" 
                                     alt="{{ $album->title }}" 
                                     class="w-full h-full object-cover rounded-md">
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection