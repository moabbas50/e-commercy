<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Database\DBAL\TimestampType;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;

class profile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.viewprofile');
    }
    public function index2()
    {
        $admins = DB::table('admins')->get();
        if(Auth::guard('admin')->user()->admin_role == 'Manger'){
            return view('admin.profile.adminsview', compact('admins'));
        }else{
            return redirect()->route('admin_dashboard')->with('error', 'you are not authorized to open this page');
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.createadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => 'required',
            'password_confirmed' => 'required|same:password',
        ]);
        $currentTimestamp = now();
        $image_data =  $request->file("image");
        if ($image_data == null) {
            DB::table('admins')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => $currentTimestamp,
            ]);
        } else {
            $image_extin = $image_data->getClientOriginalExtension();
            $image_name = time() . rand(0, 255) . "." . $image_extin;
            $location = public_path("admin/assets/images/upload/admins/");
            $image_data->move($location, $image_name);
            DB::table('admins')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $image_name,
                'created_at' => $currentTimestamp,

            ]);
        }

        return redirect()->back()->with('success', 'create Successfully');
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
        $admin = DB::table("admins")->where('id', '=', $id)->first();
        return view('admin.profile.editprofile', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        $admin = DB::table("admins")->where('id', '=', $id)->first();
        $currentTimestamp = now();
        $image_data =  $request->file("image");
        if ($image_data == null) {
            $image_name = $admin->image;
        } else {
            $image_extin = $image_data->getClientOriginalExtension();

            $image_name = time() . rand(0, 255) . "." . $image_extin;
            $location = public_path("admin/assets/images/upload/admins/");
            $image_data->move($location, $image_name);
        }
        DB::table('admins')->where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image_name,
            'updated_at' => $currentTimestamp,

        ]);
        return redirect()->route('admin_profile')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            DB::table("admins")->where('id', '=', $id)->delete();
            return redirect()->route('admins')->with('success', 'delete Successfully');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('admins')->with('err', 'You Can Not Delet Main Category before Delet There Products');
            }
            throw $e;
        }
    }
}
