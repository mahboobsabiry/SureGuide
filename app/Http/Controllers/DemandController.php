<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\BusinessIndustry;
use App\Http\Requests\StoreDemandRequest;
use App\Http\Requests\UpdateDemandRequest;

class DemandController extends Controller
{
    // Fetch all data
    public function index()
    {
        $demands = Demand::all();

        return view('demands.index', compact('demands'));
    }

    // Create
    public function create()
    {
        $industries = BusinessIndustry::all();

        return view('demands.create', compact('industries'));
    }

    // Store data
    public function store(StoreDemandRequest $request)
    {
        $request->validate();

        $demand = new Demand();
        $demand->question = $request->question;
        $demand->answer = $request->answer;
        $demand->industry_id = $request->industry_id;
        $demand->save();

        $success = 'New demand has been added successfuly!';

        return redirect()->route('demands.index')->with($success);
    }

    // Show data
    public function show(Demand $demand)
    {
        return view('demands.show', compact('demand'));
    }

    // Edit data
    public function edit(Demand $demand)
    {
        $industries = BusinessIndustry::all();

        return view('demands.edit', compact('demand', 'industries'));
    }

    // Updation
    public function update(UpdateDemandRequest $request, Demand $demand)
    {
        $request->validate();

        $demand->question = $request->question;
        $demand->answer = $request->answer;
        $demand->industry_id = $request->industry_id;
        $demand->save();

        $success = 'Demand has been updated successfuly!';

        return redirect()->route('demands.index')->with($success);
    }

    // Delete
    public function destroy(Demand $demand)
    {
        $demand->delete();
        
        $success = 'Demand has been deleted successfuly!';

        return redirect()->route('demands.index')->with($success);
    }
}
