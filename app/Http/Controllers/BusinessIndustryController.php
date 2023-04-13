<?php

namespace App\Http\Controllers;

use App\Models\BusinessIndustry;
use App\Models\Business;
use App\Http\Requests\StoreBusinessIndustryRequest;
use App\Http\Requests\UpdateBusinessIndustryRequest;

class BusinessIndustryController extends Controller
{
    // Fetch all data
    public function index()
    {
        $industries = BusinessIndustry::all();

        return view('industries.index');
    }

    // Create
    public function create()
    {
        $businesses = Business::all();

        return view('industries.create', compact('businesses'));
    }

    // Store data
    public function store(StoreBusinessIndustryRequest $request)
    {
        $request->validate();

        $industry = new Business();
        $industry->name = $request->name;
        $industry->type = $request->type;
        $industry->desc = $request->desc;
        $industry->business_id = $request->business_id;
        $industry->save();

        $success = 'New business industry has been added successfuly!';

        return redirect()->route('industries.index')->with($success);
    }

    // Show single data
    public function show(BusinessIndustry $businessIndustry)
    {
        return view('businesses.show', compact('businessIndustry'));
    }

    // Edit data
    public function edit(BusinessIndustry $businessIndustry)
    {
        return view('businesses.edit', compact('businessIndustry'));
    }

    // Update data
    public function update(UpdateBusinessIndustryRequest $request, BusinessIndustry $industry)
    {
        $request->validate();

        $industry->name = $request->name;
        $industry->type = $request->type;
        $industry->desc = $request->desc;
        $industry->business_id = $request->business_id;
        $industry->save();

        $success = 'Business industry has been updated successfuly!';

        return redirect()->route('industries.index')->with($success);
    }

    // Delete data
    public function destroy(BusinessIndustry $industry)
    {
        $industry->delete();
        
        $success = 'Business industry has been deleted successfuly!';

        return redirect()->route('businesses.index')->with($success);
    }
}
