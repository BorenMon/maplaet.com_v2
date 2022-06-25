<?php

namespace App\Http\Controllers\NormalUser;

use App\Models\SavedInput;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SavedInputController extends Controller
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
            'category_name' => 'required',
            'content' => 'required'
        ]);

        $validated['user_id'] = Auth::id();

        $input = SavedInput::create($validated);

        return response()->json([
            'content' => $input->content,
            'id' => $input->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavedInput  $savedInput
     * @return \Illuminate\Http\Response
     */
    public function show(SavedInput $savedInput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavedInput  $savedInput
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedInput $savedInput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavedInput  $savedInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavedInput $savedInput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavedInput  $savedInput
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavedInput $savedInput)
    {
        $savedInput->delete();
    }
}
