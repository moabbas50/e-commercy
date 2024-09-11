<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.users', compact('users'));
    }
    public function block(string $id)
    {
        DB::table('users')->where('id', $id)->update([
            'blocked' => true,
        ]);

        return redirect()->back()->with('done', 'the user is blocked ');
    }
    public function unblock(string $id)
    {
        DB::table('users')->where('id', $id)->update([
            'blocked' => false,
        ]);

        return redirect()->back()->with('done', 'the user Unblocked ');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
