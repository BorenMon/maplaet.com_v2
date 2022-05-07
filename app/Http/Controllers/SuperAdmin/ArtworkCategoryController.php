<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Models\ArtworkCategory;
use App\Http\Controllers\Controller;
use App\Models\BrandPage;

class ArtworkCategoryController extends Controller
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
        return view('user-area.superadmin.artwork-category.create', ['brandPage' => BrandPage::find($request->brandPage)]);
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
            'name' => 'required',
            'folder_name' => 'required',
            'brand_page_id' => 'required',
        ]);

        ArtworkCategory::create($validated);

        return redirect()->route('superadmin.brand-page.show', ['brand_page' => $request->brand_page_id])->with([
            'title' => 'Success',
            'text' => 'Artwork Category is created',
            'icon' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtworkCategory  $artworkCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArtworkCategory $artworkCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtworkCategory  $artworkCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtworkCategory $artworkCategory, Request $request)
    {
        $brandPage = BrandPage::find($request->brandPage);
        return view('user-area.superadmin.artwork-category.edit', compact('artworkCategory', 'brandPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArtworkCategory  $artworkCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArtworkCategory $artworkCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
            'folder_name' => 'required',
        ]);

        $artworkCategory->update($validated);

        return redirect()->route('superadmin.brand-page.show', ['brand_page' => $request->brand_page_id])->with([
            'title' => 'Success',
            'text' => 'Artwork Category is updated',
            'icon' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtworkCategory  $artworkCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtworkCategory $artworkCategory)
    {
        $artworkCategory->delete();

        return redirect()->back()->with([
            'title' => 'Success',
            'text' => 'Artwork Category is deleted',
            'icon' => 'success',
        ]);
    }
}
