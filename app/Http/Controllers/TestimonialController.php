<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Support\Facades\Storage;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(config('pagination.count'));
        return view('back.testimonials.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.testimonials.create');
    }


    public function edit(Testimonial $testimonial)
    {
        return view('back.testimonials.edit', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();



        // Handling the Image
        // 1- get the image
        $image = $request->image;

        // 2-rename the image
        $imageNewName = time() . '_' . $image->getClientOriginalName();

        // 3- move image to my project
        $image->storeAs('testimonials', $imageNewName, 'public');

        $data['image'] = $imageNewName;



        Testimonial::create($data);

        return to_route('back.testimonials.index')->with('success', __('keywords.testimonial_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('back.testimonials.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();



        if ($request->hasFile('image')) {

            // delete the old image
            storage::delete("public/testimonials/$testimonial->image");

            // get image
            $image = $request->image;

            // rename image
            $imageNewName = time() . '_' . $image->getClientOriginalName();

            // store inside my project
            $image->storeAs('testimonials', $imageNewName, 'public');

            $data['image'] = $imageNewName;
        }



        $testimonial->update($data);
        return to_route('back.testimonials.index')->with('success', __('keywords.testimonial_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return to_route('back.testimonials.index')->with('success', __('keywords.testimonial_deleted_successfully'));
    }
}
