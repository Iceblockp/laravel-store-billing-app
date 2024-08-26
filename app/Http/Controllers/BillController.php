<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Product;
use App\Models\Record;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        $products = Product::all();
        $records = Record::all();
        return view('bill.index', compact('bills', 'products', 'records'));
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
    public function store(StoreBillRequest $request)
    {
        $bill = new Bill();
        $product = Product::find($request->product_id);
        $bill->product_id = $request->product_id;
        $bill->quantity = $request->quantity;
        $bill->cost = $request->quantity * $request->price;
        $product->stock = $product->stock - $request->quantity;
        $product->save();
        // route('product.update',$request->product_id);
        $bill->save();
        // return $bill;
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return $bill;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $product = Product::find($bill->product_id);
        $product->stock = $product->stock + $bill->quantity;
        $product->save();
        $bill->delete();
        return back();
    }
}
