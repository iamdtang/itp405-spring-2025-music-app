<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Validator;
use DB;

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
        $validation = Validator::make($request->all(), [
            'Title' => 'required',
            'ArtistId' => 'required',
         ]);
 
        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
            ], 422);
        }
 
         return Album::create($request->all());
    }

    /**
     * Display the specified resource.
     * 
     * Example URL: http://localhost/api/albums/6?include=tracks,artist
     */
    public function show(Album $album, Request $request)
    {
        if ($request->query('include')) {
            $relationshipsToLoad = explode(',', $request->query('include'));

            // ideally there'd be more checks so consumers can't load any relationship
            $album->load($relationshipsToLoad); // $album->load(['tracks', 'artist']);
        }

        return $album;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validation = Validator::make($request->all(), [
            'Title' => 'required',
            'ArtistId' => 'required',
        ]);

         if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
            ], 422);
         }

        $album->update($request->all());
         
        return $album;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $trackCount = DB::table('tracks')
            ->where('AlbumId', '=', $album->AlbumId)
            ->count();
 
        if ($trackCount > 0) {
            return response()->json([
                'error' => 'Only albums without tracks can be deleted',
            ], 409);
        }
 
        $album->delete();

        return response(null, 204);
    }
}
