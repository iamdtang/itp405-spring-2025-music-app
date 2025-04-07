<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Example 1
        // return Album::all();

        // Example 2
        // $paginatedAlbums = Album::paginate();
        // return $paginatedAlbums;

        // Example 3: Similar to Example 1
        // $paginatedAlbums = Album::paginate();
        // return response()->json($paginatedAlbums->items());

        // Example 4:
        return Album::simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
