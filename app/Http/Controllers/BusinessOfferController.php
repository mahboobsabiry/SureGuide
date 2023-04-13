<?php

namespace App\Http\Controllers;

use App\Models\BusinessOffer;
use App\Models\BusinessIndustry;
use App\Http\Requests\StoreBusinessOfferRequest;
use App\Http\Requests\UpdateBusinessOfferRequest;

class BusinessOfferController extends Controller
{
    // Fetch all data
    public function index()
    {
        $offers = BusinessOffer::all();

        return view('business_offers.index');
    }

    // Create
    public function create()
    {
        $industries = BusinessIndustry::all();

        return view('business_offers.create', compact('industries'));
    }

    // Store data 
    public function store(StoreBusinessOfferRequest $request)
    {
        $request->validate();

        $offer = new BusinessOffer();
        $offer->question = $request->question;
        $offer->answer = $request->answer;
        $offer->industry_id = $request->industry_id;
        $offer->save();

        $success = 'New business offer has been added successfuly!';

        return redirect()->route('business_offers.index')->with($success);
    }

    // Show single data
    public function show(BusinessOffer $businessOffer)
    {
        return view('business_offers.show', compact('businessOffer'));
    }

    // Edit data
    public function edit(BusinessOffer $businessOffer)
    {
        return view('business_offers.edit', compact('businessOffer'));
    }

    // Update
    public function update(UpdateBusinessOfferRequest $request, BusinessOffer $offer)
    {
        $request->validate();

        $offer->question = $request->question;
        $offer->answer = $request->answer;
        $offer->industry_id = $request->industry_id;
        $offer->save();

        $success = 'Business offer has been updated successfuly!';

        return redirect()->route('business_offers.index')->with($success);
    }

    // Delete data
    public function destroy(BusinessOffer $businessOffer)
    {
        $businessOffer->delete();
        
        $success = 'Business offer has been deleted successfuly!';

        return redirect()->route('business_offers.index')->with($success);
    }
}
