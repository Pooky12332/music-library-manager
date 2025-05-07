<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller {
    // Return back the list of shelves for the authenticated user
    public function home()
    {
        // Fetch shelves created by other users
        $shelves = Shelf::with('user', 'albums')
            ->when(auth()->check(), function ($query) {
                $query->where('user_id', '!=', auth()->id());
            })
            ->get();

        return view('home', compact('shelves'));
    }

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Fetch shelves created by the authenticated user
        $shelves = auth()->user()->shelves()->with('albums')->get();

        return view('shelves.index', compact('shelves'));
    }

    // Create a new shelf
    public function create() {
        return view('shelves.create');
    }

    // Request a shelf
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $shelf = $request->user()->shelves()->create([
            'name' => $request->name,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('shelves.show', $shelf),
            ]);
        }

        return redirect()->route('shelves.show', $shelf)->with('success', 'Shelf created!');
    }

    // Display a shelf
    public function show(Shelf $shelf)
    {
        // Eager load albums to avoid N+1 query issues
        $shelf->load('albums');

        return view('shelves.show', [
            'shelf' => $shelf,
            'albums' => $shelf->albums,
        ]);
    }

    // Edit a shelf
    public function edit(Shelf $shelf)
    {
        // Ensure the shelf belongs to the authenticated user
        if ($shelf->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('shelves.edit', compact('shelf'));
    }

    // Update a shelf
    public function update(Request $request, Shelf $shelf)
    {
        // Ensure the shelf belongs to the authenticated user
        if ($shelf->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the new shelf name
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the shelf name
        $shelf->update([
            'name' => $request->name,
        ]);

        return redirect()->route('shelves.show', $shelf)->with('success', 'Shelf renamed successfully!');
    }

    // Destroy a shelf
    public function destroy(Shelf $shelf)
    {
        $this->authorize('delete', $shelf);

        $shelf->delete();

        return redirect()->route('shelves.index')->with('success', 'Shelf deleted!');
    }
}
