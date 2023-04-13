<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\CaseManager;
use App\Http\Requests\StoreCaseManagerRequest;
use App\Http\Requests\UpdateCaseManagerRequest;

class CaseManagerController extends Controller
{
    // Fetch all data
    public function index()
    {
        $casemanagers = CaseManager::all();

        return view('casemanagers.index', compact('casemanagers'));
    }

    // Create
    public function create()
    {
        return view('casemanagers.create');
    }

    // Store Data
    public function store(StoreCaseManagerRequest $request)
    {
        $request->validate();

        $cmgr = new CaseManager();
        $cmgr->name = $request->name;
        $cmgr->email = $request->email;
        $cmgr->password = Hash::make($request->password);
        $cmgr->save();

        $success = 'New case manager has been added successfuly!';

        return redirect()->route('casemanagers.index')->with($success);
    }

    // Show single data
    public function show(CaseManager $caseManager)
    {
        return view('casemanagers.show', compact('caseManager'));
    }

    // Edit data
    public function edit(CaseManager $caseManager)
    {
        return view('casemanagers.edit', compact('caseManager'));
    }

    // Update data
    public function update(UpdateCaseManagerRequest $request, CaseManager $cmgr)
    {
        $request->validate();

        $cmgr->name = $request->name;
        $cmgr->email = $request->email;
        // $cmgr->password = Hash::make($request->password);
        $cmgr->save();

        $success = 'Case manager has been updated successfuly!';

        return redirect()->route('casemanagers.index')->with($success);
    }

    /// Delete data
    public function destroy(CaseManager $caseManager)
    {
        $caseManager->delete();
        
        $success = 'Case manager has been deleted successfuly!';

        return redirect()->route('businesses.index')->with($success);
    }
}
