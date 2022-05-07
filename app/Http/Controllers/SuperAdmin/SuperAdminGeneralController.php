<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\AdminPage;
use App\Models\BrandPage;
use App\Http\Controllers\Controller;
use App\Models\User;

class SuperAdminGeneralController extends Controller
{
    public function dashboard(){
        $adminPagesNum = count(AdminPage::all());
        $brandPagesNum = count(BrandPage::all());
        $usersNum = count(User::where('role', '!=', 'superadmin')->get());

        $artworksNum = 0;
        foreach(AdminPage::all() as $admin) {
            foreach($admin->brand_pages as $brand){
                foreach($brand->artworkCategories as $category){
                    foreach($category->artworks as $artwork){
                        $artworksNum++;
                    }
                }
            }
        }

        return view('user-area.superadmin.dashboard', compact('adminPagesNum', 'brandPagesNum', 'usersNum', 'artworksNum'));
    }

    public function profile(){
        return view('user-area.superadmin.profile');
    }
}
