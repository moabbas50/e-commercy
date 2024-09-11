<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = DB::table('about_page')->get()->first();
        return view('admin.about.about', compact('about'));
    }
    public function index1()
    {
        $about = DB::table('about_page')->get()->first();
        return view('about', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = DB::table('about_page')->where('id', '=', $id)->first();
        return view('admin.about.editAbout',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $time= now();
        $data = DB::table("about_page")->where('id', '=', $id)->first();
        $image_data =  $request->file("imagepath");
        if ($image_data == null) {
            $image_name = $data->image_url;
        } else {
            $image_extin = $image_data->getClientOriginalExtension();
            $image_name = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/category/");
            $image_data->move($location, $image_name);
            unlink(public_path('admin/assets/images/upload/category/' . $data->imagepath));
        }
        DB::table('about_page')->where('id', '=', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'image_url' => $image_name,
            'Updated_at'=>$time
        ]);
        return redirect()->back()->with('done', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
