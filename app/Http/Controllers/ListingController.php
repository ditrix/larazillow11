<?php

namespace App\Http\Controllers;

// должно использоваться для  вариантов типа

// $this->authorize('view',$listing);
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use Auth;

class ListingController extends Controller
{

    // должно использоваться для  вариантов типа
    // $this->authorize('view',$listing);
    use AuthorizesRequests;

    public function __construct()
    {
        // если использовать это - тогда все управление идет из файла политики
        // однако не позволяет вообще никуда сунуться если посетитель незалогиненый
        // выход - в классе  политик попросительный знак ?User $user (т.е. параметр опциональный)
        // для методов которые могут работать и для гостей
        $this->authorizeResource(Listing::class,'listing');
    }

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
        //return true;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$this->authorize('create');
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->user()->listings()->
            create($request->validate([
                'beds'  => 'required|integer|min:1|max:10',
                'baths' => 'required|integer|min:1|max:10',
                'area' => 'required|integer|min:10|max:500',
                'city' => 'required|string',
                'code' => 'required|integer',
                'street' => 'required|string',
                'street_nr' => 'required|string',
                'price' => 'required|integer|min:0|max:5000',
            ]));
        return redirect()->route('listing.index')
            ->with('success', 'Listing created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {

        // if(Auth::user()->cannot('view',$listing)) {
        // метод годится если вместо стандартного abort 404 использовать что то свое
        //     abort(403);
        //    }

        //нужен трейт AuthorizesRequests;  используем как наиболее простой в контроллере
        //  $this->authorize('view',$listing);

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
            'area' => 'required|integer|min:10|max:500',
            'city' => 'required|string',
            'code' => 'required|integer',
            'street' => 'required|string',
            'street_nr' => 'required',
            'price' => 'required|integer|min:0|max:1000000',
        ]));
        return redirect()->route('listing.index')
            ->with('success', 'Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if(Auth::user()) {
            $listing->delete($listing->id);

            return redirect()->back()
                ->with('success', 'Deleted');
        } else {
            return redirect()->route('login');
        }

    }
}
