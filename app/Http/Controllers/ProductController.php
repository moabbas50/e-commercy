<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $op = 1;
        $products = DB::table('products')->get();
        $categories= DB::table('categories')->get();
        return view('product', ['products' => $products, 'op' => $op,'categories'=>$categories]);

        // if ($catid == null) {
        //     $products = DB::table('products')->get();
        //     return view('product', ['products' => $products]);
        // } else {
        //     $products = DB::table('products')->where('categoryID', $catid)->get();
        //     return view('product', ['products' => $products]);
        // }

    }
    public function indexA()
    {
        $op = 1;
        $products =  DB::table('products')->get();
        return view('admin.product.view', compact('products', 'op'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  DB::table('categories')->get();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $image_data =  $request->file("imagepath");
        // $image_extin = $image_data->getClientOriginalExtension();

        // $image_name = time() . rand(0, 255) . "." . $image_extin;
        // $location = public_path("admin/assets/images/upload/products/");
        // $image_data->move($location, $image_name);

        $categoryData = json_decode($request->input('category'), true);
        $catid = $categoryData['id'];
        $catname = $categoryData['name'];
        $admin = Auth::guard('admin')->user()->id ;
        DB::table('products')->insert([
            'Name' => $request->ProductName,
            'Description' => $request->description,
            'Price' => $request->price,
            'stock' => $request->stock,
            'categoryID' => $catid,
            'categoryname' => $catname,
            'CreatedByAdminID' => $admin,
        ]);

        return redirect()->back()->with('done', 'create Successfully');
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = DB::table('products')->where('categoryID', $id)->get();
        $catName = DB::table('categories')->where('categoryID', $id)->first();

        $op = 0;
        return view('product', ['products' => $products, 'op' => $op,'catName'=>$catName]);
    }
    public function show1(string $id)
    {
        $catName = DB::table('categories')->where('categoryID', $id)->first();
        $products = DB::table('products')->where('categoryID', $id)->get();
        $op = 0;
        return view('admin.product.view', ['products' => $products, 'op' => $op, 'cat' => $catName]);
    }
    public function show2(string $id)
    {
        $products = DB::table('products')->where('ProductID', $id)->first();
        $imagepath = DB::table('photos')->where('ProductID',$id)->first();
        return view('admin.product.productView', ['products' => $products,'imagepath'=>$imagepath]);
    }
    public function show3(string $id)
    {
        $product = DB::table('products')->where('ProductID', $id)->first();
        return view('single-product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table("products")->where('ProductID', '=', $id)->first();
        $categories =DB::table('categories')->get();
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryData = json_decode($request->input('category'), true);
        $catid = $categoryData['id'];
        $catname = $categoryData['name'];
        $admin = Auth::guard('admin')->user()->id ;
        DB::table('products')->where('ProductID', '=', $id)->update([
            'Name' => $request->Name,
            'Description' => $request->Description,
            'Price' => $request->Price,
            'categoryID' =>  $catid,
            'categoryname' => $catname,
            'LastModifiedByAdminID' => $admin,

        ]);
        return redirect()->back()->with('done', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // try {
            DB::table("products")->where('ProductID', '=', $id)->delete();
            return redirect()->back()->with('done', 'delete Successfully');
        // } catch (QueryException $e) {
        //     if ($e->getCode() == "23000") {
        //         return redirect()->route('category')->with('err', 'You Can Not Delet Main Category before Delet There Products');
        //     }
        //     throw $e;
        // }
    }
}
