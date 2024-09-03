<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class photoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $productid = $id;
        $product= DB::table('products')->where('ProductID','=',$productid)->first();
        return view('admin.product.addimages', compact('productid','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $time = now();
        $request->validate([
            'imagepath1' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath2' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath3' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath4' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
        ]);
        // image 1/////
        $image_data1 =  $request->file("imagepath1");
        if ($image_data1) {
            $image_extin = $image_data1->getClientOriginalExtension();

            $image_name1 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data1->move($location, $image_name1);
        }

        // image2/////
        $image_data2 =  $request->file("imagepath2");
        if ($image_data2) {
            $image_extin = $image_data2->getClientOriginalExtension();

            $image_name2 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data2->move($location, $image_name2);
        }

        // image 3 ///////////
        $image_data3 =  $request->file("imagepath3");
        if ($image_data3) {
            $image_extin = $image_data3->getClientOriginalExtension();

            $image_name3 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data3->move($location, $image_name3);
        }
        // //// image 4 ////
        $image_data4 =  $request->file("imagepath4");
        if ($image_data4) {
            $image_extin = $image_data4->getClientOriginalExtension();

            $image_name4 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data4->move($location, $image_name4);
        }
        // //////////////////////////////////////////////////////////////
        if ($image_data1) {
            DB::table('photos')->insert([
                'ProductID' => $id,
                'PhotoURL' => $image_name1,
                'CreatedAt' => $time
            ]);
        }
        if ($image_data2) {
            DB::table('photos')->insert([
                'ProductID' => $id,
                'PhotoURL' => $image_name2,
                'CreatedAt' => $time
            ]);
        }
        if ($image_data3) {
            DB::table('photos')->insert([
                'ProductID' => $id,
                'PhotoURL' => $image_name3,
                'CreatedAt' => $time
            ]);
        }
        if ($image_data4) {
            DB::table('photos')->insert([
                'ProductID' => $id,
                'PhotoURL' => $image_name4,
                'CreatedAt' => $time
            ]);
        }
        return redirect()->back()->with('done', 'uplod images Successfully');
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
        $photos = DB::table('photos')->where('ProductID', '=', $id)->get();
        $Product = DB::table('products')->where('ProductID', '=', $id)->first();
        return view('admin.product.editphoto', compact('photos', 'Product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagepath1' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath2' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath3' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'imagepath4' => ['mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
        ]);
        // image 1/////

        $image_data1 =  $request->file("imagepath1");
        if ($image_data1) {
            $image_extin = $image_data1->getClientOriginalExtension();
            $image_name1 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data1->move($location, $image_name1);
            if ($request->PhotoID1) {
                $photoid1 = $request->PhotoID1;
                $photos1 = DB::table('photos')->get()->where('PhotoID', '=', $photoid1)->first();
                $oldPath1 = $photos1->PhotoURL;
                unlink(public_path('admin/assets/images/upload/products/' . $oldPath1));
            }
            DB::table('photos')->where('PhotoID', '=', $photoid1)->update([
                'PhotoURL' => $image_name1,
            ]);
        }
        // image2/////
        $image_data2 =  $request->file("imagepath2");
        if ($image_data2) {
            $image_extin = $image_data2->getClientOriginalExtension();
            $image_name2 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data2->move($location, $image_name2);
            if ($request->PhotoID2) {
                $photoid2 = $request->PhotoID2;
                $photos2 = DB::table('photos')->get()->where('PhotoID', '=', $photoid2)->first();
                $oldPath2 = $photos2->PhotoURL;
                unlink(public_path('admin/assets/images/upload/products/' . $oldPath2));
            }
            DB::table('photos')->where('PhotoID', '=', $photoid2)->update([
                'PhotoURL' => $image_name2,
            ]);
        }
        // image 3 ///////////
        $image_data3 =  $request->file("imagepath3");
        if ($image_data3) {
            $image_extin = $image_data3->getClientOriginalExtension();
            $image_name3 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data3->move($location, $image_name3);
            if ($request->PhotoID3) {
                $photoid3 = $request->PhotoID3;
                $photos3 = DB::table('photos')->get()->where('PhotoID', '=', $photoid3)->first();
                $oldPath3 = $photos3->PhotoURL;
                unlink(public_path('admin/assets/images/upload/products/' . $oldPath3));
            }
            DB::table('photos')->where('PhotoID', '=', $photoid3)->update([
                'PhotoURL' => $image_name3,
            ]);
        }
        // //// image 4 ////

        $image_data4 =  $request->file("imagepath4");
        if ($image_data4) {
            $image_extin = $image_data4->getClientOriginalExtension();
            $image_name4 = time() . rand(0, 255) . "." . $image_extin;
            // $image_name = time() . rand(0,255). $image_data->getClientOriginalName();
            $location = public_path("admin/assets/images/upload/products/");
            $image_data4->move($location, $image_name4);
            if ($request->PhotoID4) {
                $photoid4 = $request->PhotoID4;
                $photos4 = DB::table('photos')->get()->where('PhotoID', '=', $photoid4)->first();
                $oldPath4 = $photos4->PhotoURL;
                unlink(public_path('admin/assets/images/upload/products/' . $oldPath4));
            }

            DB::table('photos')->where('PhotoID', '=', $photoid4)->update([
                'PhotoURL' => $image_name4,
            ]);
        }
        return redirect()->back()->with('done', 'uplod images Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
