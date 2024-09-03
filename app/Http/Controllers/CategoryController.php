<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  DB::table('categories')->get();

        return view('category', compact('categories'));
    }
    public function indexA()
    {
        $categories =  DB::table('categories')->get();

        return view('admin.category.view', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'categoryName' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'imagepath' => 'required',

        ]);
        $image_data =  $request->file("imagepath");
        $image_extin = $image_data->getClientOriginalExtension();

        $image_name = time() . rand(0, 255) . "." . $image_extin;
        // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
        $location = public_path("admin/assets/images/upload/category/");
        $image_data->move($location, $image_name);
        $cat = DB::table('categories')->insert([
            'categoryName' => $request->categoryName,
            'description' => $request->description,
            'imagepath' => $image_name

        ]);
        if($cat){
            return redirect()->back()->with('done', 'create Successfully');
        }else{

        }
        // dd($request);
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
        $cate = DB::table("categories")->where('categoryID', '=', $id)->first();
        return view('admin.category.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DB::table("categories")->where('categoryID', '=', $id)->first();
        $image_data =  $request->file("imagepath");
        if ($image_data == null) {
            $image_name = $data->imagepath;
        } else {
            $image_extin = $image_data->getClientOriginalExtension();
            $image_name = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/category/");
            $image_data->move($location, $image_name);
            unlink(public_path('admin/assets/images/upload/category/' . $data->imagepath));
        }
        DB::table('categories')->where('categoryID', '=', $id)->update([
            'categoryName' => $request->categoryName,
            'description' => $request->description,
            'imagepath' => $image_name

        ]);
        return redirect()->route('category')->with('done', 'Update Successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = DB::table("categories")->where('categoryID', '=', $id)->delete();

        // if ($data){
        //     return redirect()->route('category')->with('done', 'delete Successfully');
        // }else{
        //     return redirect()->route('category')->with('done', 'You Can Not Delet Main Category before Delet There Products');

        // }




        try {
            DB::table("categories")->where('categoryID', '=', $id)->delete();
            return redirect()->route('category')->with('done', 'delete Successfully');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('category')->with('err', 'You Can Not Delet Main Category before Delet There Products');
            }
            throw $e;
        }
    }
}
