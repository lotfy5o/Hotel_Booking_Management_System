<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Http\Requests\StoreAmenityRequest;
use App\Http\Requests\UpdateAmenityRequest;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenity::paginate(config('pagination.count'));
        return view('back.amenities.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAmenityRequest $request)
    {
        $data = $request->validated();


        Amenity::create($data);

        return to_route('back.amenities.index')->with('success', __('keywords.amenity_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenity $amenity)
    {
        return view('back.amenities.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
        return view('back.amenities.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
        $data = $request->validated();


        $amenity->update($data);
        return to_route('back.amenities.index')->with('success', __('keywords.amenity_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return to_route('back.amenities.index')->with('success', __('keywords.amenity_deleted_successfully'));
    }
}
