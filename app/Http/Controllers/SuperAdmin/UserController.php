<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $currentUser = Auth::user();
        // switch($currentUser->role) {
        //     case 'superadmin':
        //         $users = User::all()->reject(function($user){
        //             return $user->role == 'superadmin';
        //         });
        //         break;
        //     case 'admin':
        //         $users = User::all()->reject(function($user){
        //             return $user->role == 'superadmin' || $user->role == 'admin';
        //         });
        //         break;
        // }

        // return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user-area.superadmin.user.create', ['adminPage' => AdminPage::find($request->adminPage)]);
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
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,user',
            'admin_page_id' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);

        return redirect()->route('superadmin.admin-page.show', ['admin_page' => $validated['admin_page_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $adminPage = AdminPage::find($request->adminPage);
        return view('user-area.superadmin.user.edit', compact('adminPage', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $brandPages = AdminPage::find($request->adminPage)->brand_pages;

        $pages = array();

        foreach($brandPages as $page){
            if($request["$page->folder_name"]) $pages[] = $page->id;
        }

        $validated['accessible_pages_id'] = $pages;
        
        $user->update($validated);

        return redirect()->route('superadmin.admin-page.show', ['admin_page' => $request->adminPage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
