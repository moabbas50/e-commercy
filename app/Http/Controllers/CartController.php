<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $cartproduct = DB::table('cartproduct_view')->where('userid', $userId)->get();
        return view('mycart', compact('cartproduct'));
    }

    public function changes(string $id)
    {
        $product = DB::table('cartproduct_view')->where('cartitem_id', $id)->get('product_name');

        // Check if the product exists in the cart
        if ($product) {
            DB::table('cartitems')->where('CartItemID', $id)->update([
                'state' => 'Pending',
            ]);

            return redirect()->back()->with('success', " Product is Pending to buy ");
        } else {
            return redirect()->back()->with('error', 'Product not found in the cart.');
        }
    }
    public function confirme(string $id)
    {
        $currentTimestamp = now();
        $oreder = DB::table('cartproduct_view')->where('cartitem_id', $id)->first();

        // Check if the product exists in the cart
        if ($oreder) {
            DB::table('cartitems')->where('CartItemID', $id)->update([
                'state' => 'Confirmed',
            ]);
            DB::table('orders')->insert([
                'userID' => $oreder->userid,
                'OrderDate' => $currentTimestamp,
                'product_id' => $oreder->product_id,
                'product_name' => $oreder->product_name,
                'quantity' => $oreder->products_qnt,
                'TotalAmount' => $oreder->total_price,
                'invoice_no' => time(),
            ]);


            return redirect()->back()->with('success', "Your confirmation is done ");
        } else {
            return redirect()->back()->with('error', 'Product not found in the cart.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        $userId = Auth::user()->id;
        $currentTimestamp = now();
        // Find or create the cart for the user
        // $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $isexist = DB::table('shoppingcart')->where('userID', $userId)->get()->first();
        if ($isexist) {
            $cartID = $isexist->CartID;
        } else {
            DB::table('shoppingcart')->insert([
                'userID' => $userId,
                'CreatedAt' => $currentTimestamp,
            ]);
            $cartID = DB::table('shoppingcart')->where('userID', $userId)->get('CartID')->first();
        }

        // Check if the product is already in the cart
        $cartItem = DB::table('cartitems')->where('ProductID', $productId)->get()->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            DB::table('cartitems')->where('ProductID', $productId)->update([

                'quantity' =>  $quantity

            ]);
            return redirect()->back()->with('success', 'the product is already add to cart pefore the new quantity is add ');
        } else {
            // If the product is not in the cart, create a new cart item
            DB::table('cartitems')->insert([
                'CartID' => $cartID,
                'ProductID' => $productId,
                'quantity' => $quantity,
                'CreatedAt' => $currentTimestamp,
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
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

        $product = DB::table('cartproduct_view')->where('cartitem_id', $id)->get('product_id');
        // Check if the product exists in the cart
        if ($product) {
            DB::table('cartitems')->where('CartItemID', $id)->update([
                'Quantity' => $request->quantity,
            ]);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found in the cart.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // try {
        DB::table("cartitems")->where('CartItemID', '=', $id)->delete();
        return redirect()->route('MyCart')->with('success', 'delete Successfully');
        // } catch (QueryException $e) {
        //     if ($e->getCode() == "23000") {
        //         return redirect()->route('admins')->with('err', 'You Can Not Delet item from cart before Delet There Products');
        //     }
        //     throw $e;
        // }
    }
}
