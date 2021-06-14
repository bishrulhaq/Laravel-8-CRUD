<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::latest()->paginate(5);
        return view('stocks.index',compact('stocks'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_qty' => 'required',
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success','Created Successfully.');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show',compact('stock'));
    }


    public function edit(Stock $stock)
    {
        return view('stocks.edit',compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_qty' => 'required',
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success','Updated Successfully.');
    }


    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success','Student deleted successfully.');
    }
}
