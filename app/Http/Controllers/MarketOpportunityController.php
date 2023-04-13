<?php

namespace App\Http\Controllers;

use App\Models\MarketOpportunity;
use App\Models\BusinessIndustry;
use App\Http\Requests\StoreMarketOpportunityRequest;
use App\Http\Requests\UpdateMarketOpportunityRequest;

class MarketOpportunityController extends Controller
{
    // Fetch all data
    public function index()
    {
        $market = MarketOpportunity::all();

        return view('market.index', compact('market'));
    }

    // Create
    public function create()
    {
        $industries = BusinessIndustry::all();

        return view('market.create', compact('industries'));
    }

    // Store data
    public function store(StoreMarketOpportunityRequest $request)
    {
        $request->validate();

        $market = new MarketOpportunity();
        $market->question = $request->question;
        $market->answer = $request->answer;
        $market->industry_id = $request->industry_id;
        $market->save();

        $success = 'Market opportunity has been added successfuly!';

        return redirect()->route('market.index')->with($success);
    }

    // Show
    public function show(MarketOpportunity $mt)
    {
        return view('market.show', compact('mt'));
    }

    // Edit
    public function edit(MarketOpportunity $mt)
    {
        return view('market.show', compact('mt'));
    }

    // Update
    public function update(UpdateMarketOpportunityRequest $request, MarketOpportunity $market)
    {
        $request->validate();

        $market->question = $request->question;
        $market->answer = $request->answer;
        $market->industry_id = $request->industry_id;
        $market->save();

        $success = 'Market opportunity has been updated successfuly!';

        return redirect()->route('market.index')->with($success);
    }

    // Delete data
    public function destroy(MarketOpportunity $mt)
    {
        $mt->delete();
        
        $success = 'Market opportunity has been deleted successfuly!';

        return redirect()->route('market.index')->with($success);
    }
}
