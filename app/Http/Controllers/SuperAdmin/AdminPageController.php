<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\AdminPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-area.superadmin.admin-page.index', ['admin_pages' => AdminPage::paginate(7)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-area.superadmin.admin-page.create');
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
            'name' => 'required|unique:admin_pages,name',
            'folder_name' => 'required|unique:admin_pages,folder_name',
            'is_active' => 'required|in:1,0',
            'logo' => 'required|image'
        ]);

        $url = $request->file('logo')->store('public/admin-page-logo');

        $validated['logo_url'] = $url;

        AdminPage::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminPage  $adminPage
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPage $adminPage)
    {
        $brandPages = $adminPage->brand_pages;
        $users = $adminPage->users;

        $artworks = 0;
        foreach($adminPage->brand_pages as $brand){
            foreach($brand->artworkCategories as $category){
                foreach($category->artworks as $artwork){
                    $artworks++;
                }
            }
        }

        return view('user-area.superadmin.admin-page.show', compact('adminPage', 'brandPages', 'users', 'artworks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPage  $adminPage
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminPage $adminPage)
    {
        return view('user-area.superadmin.admin-page.edit', compact('adminPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPage  $adminPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminPage $adminPage)
    {
        $validated = $request->validate([
            'name' => "required|unique:admin_pages,name,$adminPage->id",
            'folder_name' => "required|unique:admin_pages,folder_name,$adminPage->id",
            'is_active' => 'required|in:1,0',
            'logo' => 'image'
        ]);

        if($request->hasFile('logo')){
            Storage::delete($adminPage->logo_url);
            $url = $request->file('logo')->store('public/admin-page-logo');

            $validated['logo_url'] = $url;
        }

        $adminPage->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminPage  $adminPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminPage $adminPage)
    {
        Storage::delete($adminPage->logo_url);
        foreach($adminPage->brand_pages as $page) {
            Storage::delete($page->logo_url);
        }
        $adminPage->delete();

        return redirect()->route('superadmin.admin-page.index');
    }
}
