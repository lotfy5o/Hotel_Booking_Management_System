<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(config('pagination.count'));
        return view('back.services.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();



        // Handling the Image
        // 1- get the image
        $image = $request->image;

        // 2-rename the image
        $imageNewName = time() . '_' . $image->getClientOriginalName();

        // 3- move image to my project
        $image->storeAs('services', $imageNewName, 'public');

        $data['image'] = $imageNewName;



        Service::create($data);

        return to_route('back.services.index')->with('success', __('keywords.service_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('back.services.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('back.services.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();



        if ($request->hasFile('image')) {

            // delete the old image
            storage::delete("public/services/$service->image");

            // get image
            $image = $request->image;

            // rename image
            $imageNewName = time() . '_' . $image->getClientOriginalName();

            // store inside my project
            $image->storeAs('services', $imageNewName, 'public');

            $data['image'] = $imageNewName;
        }



        $service->update($data);
        return to_route('back.services.index')->with('success', __('keywords.service_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return to_route('back.services.index')->with('success', __('keywords.service_deleted_successfully'));
    }
}
