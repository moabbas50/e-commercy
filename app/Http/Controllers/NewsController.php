<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DB::table('news')->get();
        return view('admin.news.view', compact('news'));
    }
    public function index1()
    {
        $news = DB::table('news')->get();
        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'image_url' => 'required',
        ]);
        $image_data =  $request->file("image_url");
        $image_extin = $image_data->getClientOriginalExtension();
        $image_name = time() . rand(0, 255) . "." . $image_extin;
        // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
        $location = public_path("admin/assets/images/upload/News/");
        $image_data->move($location, $image_name);

        DB::table('news')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $image_name

        ]);
        return redirect()->back()->with('done', 'create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $news = DB::table('news')->where('id', $id)->first();
        return view('admin.news.singleNews',compact('news') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        return view('admin.news.editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $image_data =  $request->file("image_url");
        if ($image_data) {
            $image_extin = $image_data->getClientOriginalExtension();
            $image_name = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/News/");
            $image_data->move($location, $image_name);
            DB::table('news')->where('id', '=', $id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'image_url' => $image_name
            ]);
        }else{
            DB::table('news')->where('id', '=', $id)->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->back()->with('done', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("news")->where('id', '=', $id)->delete();
        return redirect()->back()->with('done', 'delete Successfully');
    }
}
