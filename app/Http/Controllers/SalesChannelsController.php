<?php

namespace App\Http\Controllers;

use App\Models\SalesChannels;
use App\Http\Requests\StoreSalesChannelsRequest;
use App\Http\Requests\UpdateSalesChannelsRequest;

class SalesChannelsController extends Controller
{
    // Fetch all data
    public function index()
    {
        $sales = SalesChannels::all();

        return view('sales.index', compact('sales'));
    }

    // Create
    public function create()
    {
        $industries = BusinessIndustry::all();

        return view('sales.create', compact('industries'));
    }

    // Store data
    public function store(StoreSalesChannelsRequest $request)
    {
        $request->validate();

        $sale = new SalesChannels();
        $sale->question = $request->question;
        $sale->answer = $request->answer;
        $sale->industry_id = $request->industry_id;
        $sale->save();

        $success = 'Sale channel has been added successfuly!';

        return redirect()->route('sales.index')->with($success);
    }

    // Show
    public function show(SalesChannels $sale)
    {
        return view('sales.show', compact('sale'));
    }

    // Edit
    public function edit(SalesChannels $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    // Update
    public function update(UpdateSalesChannelsRequest $request, SalesChannels $sale)
    {
        $request->validate();

        $sale->question = $request->question;
        $sale->answer = $request->answer;
        $sale->industry_id = $request->industry_id;
        $sale->save();

        $success = 'Sale channel has been updated successfuly!';

        return redirect()->route('sales.index')->with($success);
    }

    // Delete data
    public function destroy(SalesChannels $sale)
    {
        $sale->delete();
        
        $success = 'Sale has been deleted successfuly!';

        return redirect()->route('sales.index')->with($success);
    }
}
