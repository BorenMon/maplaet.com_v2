<?php

namespace App\Http\Controllers\NormalUser;

use App\Models\SavedImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SavedImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
            'type' => 'required',
            'artwork_id' => 'required'
        ]);

        $url = $request->file('image')->store('public/test/');

        $validated['user_id'] = Auth::user()->id;
        $validated['url'] = $url;

        $image = SavedImage::create($validated);

        return response()->json([
            'url' => $image->url,
            'id' => $image->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavedImage  $savedImage
     * @return \Illuminate\Http\Response
     */
    public function show(SavedImage $savedImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavedImage  $savedImage
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedImage $savedImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavedImage  $savedImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavedImage $savedImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavedImage  $savedImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavedImage $savedImage)
    {
        Storage::delete($savedImage->url);
        $savedImage->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
