<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(config('pagination.count'));
        return view('admin.hotels.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        $data = $request->validated();

        // Handling the Image
        // 1- get the image
        $image = $request->image;

        // 2-rename the image
        $imageNewName = time() . '_' . $image->getClientOriginalName();

        // 3- move image to my project
        $image->storeAs('hotels', $imageNewName, 'public');

        $data['image'] = $imageNewName;

        Hotel::create($data);

        return to_route('admin.hotels.index')->with('success', __('keywords.hotel_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            // delete the old image
            storage::delete("public/hotels/$hotel->image");

            // get image
            $image = $request->image;

            // rename image
            $imageNewName = time() . '_' . $image->getClientOriginalName();

            // store inside my project
            $image->storeAs('hotels', $imageNewName, 'public');

            $data['image'] = $imageNewName;
        }

        $hotel->update($data);
        return to_route('admin.hotels.index')->with('success', __('keywords.hotel_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        Storage::delete("public/hotels/$hotel->image");

        $hotel->delete();
        return to_route('admin.hotels.index')->with('success', __('keywords.hotel_deleted_successfully'));
    }
}
