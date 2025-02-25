<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return inertia(
            'Listing/Index',
            [

                'listings' => Listing::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Listing::create($request->validate([
            'beds'  => 'required|integer|min:1|max:10',
            'baths' => 'required|integer|min:1|max:10',
            'area' => 'required|integer|min:10|max:100',
            'city' => 'required|string',
            'code' => 'required|integer',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|integer|min:0',
        ]));
        return redirect()->route('listing.index')
            ->with('success', 'Listing created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'beds'  => 'required|integer|min:1|max:10',
            'baths' => 'required|integer|min:1|max:10',
            'area' => 'required|integer|min:10|max:100',
            'city' => 'required|string',
            'code' => 'required|integer',
            'street' => 'required|string',
            'street_nr' => 'required|string',
            'price' => 'required|integer|min:0',
        ]));
        return redirect()->route('listing.index')
            ->with('success', 'Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete($listing->id);

        return redirect()->back()
            ->with('success', 'Deleted');
    }
}
