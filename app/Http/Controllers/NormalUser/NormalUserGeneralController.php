<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NormalUserGeneralController extends Controller
{   
    public function home(){
        $user = Auth::user();
        if($user->role == 'admin') $brandPages = $user->adminPage->brand_pages;
        else $brandPages = $user->adminPage->brand_pages->filter(function($obj) use($user){
            return in_array($obj->id, $user->accessible_pages_id);
        });
        return view('user-area.normal-user.home', compact('brandPages'));
    }

    public function profile(){
        return view('user-area.normal-user.profile');
    }
}
