<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders =  DB::table('orders')->orderBy('OrderDate', 'desc')->get();
        return view('admin.order.orders-view', compact('orders'));
    }



    public function notify()
    {
        $orders =  DB::table('orders')->where('notification', 'notify')->get();
        foreach ($orders as $order) {
            DB::table('orders')->where('OrderID', $order->OrderID)->update(['notification' => 'read']);
        }
        return redirect()->back();
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
        //
    }
    /////////// change///////
    public function accept(string $id)
    {
        DB::table('orders')->where('OrderID', '=', $id)->update([
            'Status' => 'ordering',
        ]);
        return redirect()->back()->with('done', 'Order  Accepted');
    }
    public function complete(string $id)
    {

        DB::table('orders')->where('OrderID', '=', $id)->update([
            'Status' => 'complete',
        ]);
        return redirect()->back()->with('done', 'Order  Complete');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = DB::table('orders')->where('OrderID', '=', $id)->first();
        $userID = $order->userID;
        $user = DB::table('users')->where('id', '=', $userID)->first();
        DB::table('orders')->where('OrderID',$id)->update(['notification' => 'read']);
        return view('admin.order.single-order', compact('order', 'user'));
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
