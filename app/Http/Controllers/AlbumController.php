<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    public function index(Shelf $shelf)
    {
        // Ensure the shelf belongs to the authenticated user
        if ($shelf->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the albums associated with the shelf
        $albums = $shelf->albums;

        return view('albums.index', compact('albums', 'shelf'));
    }

    // Handle the album search and fetch results from Discogs
    public function search(Request $request, Shelf $shelf)
    {
        $query = $request->input('query');
        $artist = $request->input('artist');
        $format = $request->input('format');
        $country = $request->input('country');

        // Build the MusicBrainz API query
        $apiQuery = 'release:' . $query;
        if (!empty($artist)) {
            $apiQuery .= ' AND artist:' . $artist;
        }
        if (!empty($format)) {
            $apiQuery .= ' AND format:' . $format;
        }
        if (!empty($country)) {
            $apiQuery .= ' AND country:' . $country;
        }

        // Fetch results from MusicBrainz API
        $response = Http::withOptions(['verify' => false])->get('https://musicbrainz.org/ws/2/release/', [
            'query' => $apiQuery,
            'fmt' => 'json',
        ]);

        if ($response->successful()) {
            $results = $response->json()['releases'] ?? [];
            return view('albums.search', compact('shelf', 'results'));
        } else {
            return back()->with('error', 'Failed to fetch album data from MusicBrainz.');
        }
    }

    // Store a newly created album in the database
    public function store(Request $request, Shelf $shelf)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'format' => 'nullable|string|max:255',
            'api_id' => 'nullable|string|max:255',
        ]);

        // Set release_year to null if it's unknown
        if ($validated['release_year'] == '1900') {
            $validated['release_year'] = null;
        }

        // Add the album to the shelf
        $shelf->albums()->create($validated);

        return redirect()->route('shelves.show', $shelf)->with('success', 'Album added to your shelf!');
    }

    // Delete an album from the shelf
    public function destroy(Shelf $shelf, Album $album) {
            $album->delete();
    
        return redirect()->route('shelves.show', $shelf)->with('success', 'Album deleted!');
    }
}
