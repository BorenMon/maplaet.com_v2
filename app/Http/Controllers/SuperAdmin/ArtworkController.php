<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Artwork;
use App\Models\BrandPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
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
    public function create(Request $request)
    {
        return view('user-area.superadmin.artwork.create', ['brandPage' => BrandPage::find($request->brandPage)]);
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
            'number' => 'required',
            'artwork_category_id' => 'required',
            'image' => 'required|image'
        ]);

        $url = $request->file('image')->store('public/artwork-image-preview');

        $validated['image_preview_url'] = $url;

        Artwork::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork, Request $request)
    {
        $brandPage = BrandPage::find($request->brandPage);
        return view('user-area.superadmin.artwork.edit', compact('artwork', 'brandPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artwork $artwork)
    {
        $validated = $request->validate([
            'number' => 'required',
            'artwork_category_id' => 'required',
            'image' => 'image'
        ]);

        if($request->hasFile('image')){
            Storage::delete($artwork->image_preview_url);
            $url = $request->file('image')->store('public/artwork-image-preview');

            $validated['image_preview_url'] = $url;
        }

        $artwork->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        Storage::delete($artwork->image_preview_url);
        $artwork->delete();
        return redirect()->back()->with([
            'title' => 'Success',
            'text' => 'Artwork is deleted',
            'icon' => 'success',
        ]);
    }
}
