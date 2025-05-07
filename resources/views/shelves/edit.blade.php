@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Rename Shelf</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('shelves.update', $shelf) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="shelfName" class="block text-sm font-medium text-gray-700">New Shelf Name</label>
                <input type="text" id="shelfName" name="name" value="{{ $shelf->name }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection