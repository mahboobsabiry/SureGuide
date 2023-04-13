<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;

class BusinessController extends Controller
{
    // Index
    public function index()
    {
        $businesses = Business::all();

        return view('businesses.index');
    }
 
    // Create
    public function create()
    {
        return view('businesses.create');
    }

    // Store
    public function store(StoreBusinessRequest $request)
    {
        $request->validate();

        $business = new Business();
        $business->name = $request->name;
        $business->type = $request->type;
        $business->desc = $request->desc;
        $business->save();

        $success = 'New business has been added successfuly!';

        return redirect()->route('businesses.index')->with($success);
    }

    // Show
    public function show(Business $business)
    {
        return view('businesses.show', compact('business'));
    }

    // Edit
    public function edit(Business $business)
    {
        return view('businesses.edit', compact('business'));
    }

    // Update
    public function update(UpdateBusinessRequest $request, Business $business)
    {
        $request->validate();

        $business->name = $request->name;
        $business->type = $request->type;
        $business->desc = $request->desc;
        $business->save();

        $success = 'Business has been updated successfuly!';

        return redirect()->route('businesses.index')->with($success);
    }

    // Delete
    public function destroy(Business $business)
    {
        $business->delete();
        
        $success = 'Business has been deleted successfuly!';

        return redirect()->route('businesses.index')->with($success);
    }
}
