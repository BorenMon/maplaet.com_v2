<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\BrandPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminPage;
use Illuminate\Support\Facades\Storage;

class BrandPageController extends Controller
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
        $adminPage = AdminPage::find($request->adminPage);
        return view('user-area.superadmin.brand-page.create', compact('adminPage'));
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
            'name' => 'required|unique:brand_pages,name',
            'folder_name' => 'required|unique:brand_pages,folder_name',
            'logo' => 'required|image',
            'admin_page_id' => 'required',
            'is_active' => 'required|in:1,0'
        ]);

        $url = $request->file('logo')->store('public/brand-page-logo');

        $validated['logo_url'] = $url;

        BrandPage::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrandPage  $brandPage
     * @return \Illuminate\Http\Response
     */
    public function show(BrandPage $brandPage)
    {
        return view('user-area.superadmin.brand-page.show', compact('brandPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandPage  $brandPage
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandPage $brandPage)
    {
        return view('user-area.superadmin.brand-page.edit', compact('brandPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrandPage  $brandPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandPage $brandPage)
    {
        $validated = $request->validate([
            'name' => "required|unique:brand_pages,name,$brandPage->id",
            'folder_name' => "required|unique:brand_pages,folder_name,$brandPage->id",
            'is_active' => 'required|in:1,0',
            'logo' => 'image'
        ]);

        if($request->hasFile('logo')){
            Storage::delete($brandPage->logo_url);
            $url = $request->file('logo')->store('public/brand-page-logo');

            $validated['logo_url'] = $url;
        }

        $brandPage->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandPage  $brandPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandPage $brandPage)
    {
        Storage::delete($brandPage->logo_url);
        $brandPage->delete();

        return redirect()->back();
    }
}
