<?php

namespace App\Http\Controllers\NormalUser;

use App\Models\User;
use App\Models\AdminPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('manage_user');

        $users = User::where('admin_page_id', Auth::user()->admin_page_id)->where('role', '=', 'user')->get();

        return view('user-area.normal-user.user.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-area.normal-user.user.create');
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
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user';
        $validated['admin_page_id'] = Auth::user()->admin_page_id;
        $validated['accessible_pages_id'] = [];
        
        User::create($validated);

        return redirect()->route('user.index')->with([
            'title' => 'Success',
            'text' => 'User is created',
            'icon' => 'success',
        ]);
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
    public function edit(User $user)
    {
        $adminPage = AdminPage::find($user->admin_page_id);
        return view('user-area.normal-user.user.edit', compact('adminPage', 'user'));
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
        $brandPages = AdminPage::find($user->admin_page_id)->brand_pages;

        $pages = array();

        foreach($brandPages as $page){
            if($request["$page->folder_name"]) $pages[] = $page->id;
        }

        $validated['accessible_pages_id'] = $pages;
        
        $user->update($validated);

        return redirect()->route('user.index')->with([
            'title' => 'Success',
            'text' => 'User is updated',
            'icon' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        foreach($user->savedImages as $image){
            Storage::delete($image->url);
        }
        $user->savedImages()->delete();
        $user->delete();

        return redirect()->back()->with([
            'title' => 'Success',
            'text' => 'User is deleted',
            'icon' => 'success',
        ]);
    }
}
