<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateRoomRequest;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(config('pagination.count'));
        return view('back.rooms.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::get();
        return view('back.rooms.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $data = $request->validated();



        // Handling the Image
        // 1- get the image
        $image = $request->image;

        // 2-rename the image
        $imageNewName = time() . '_' . $image->getClientOriginalName();

        // 3- move image to my project
        $image->storeAs('rooms', $imageNewName, 'public');

        $data['image'] = $imageNewName;



        Room::create($data);

        return to_route('back.rooms.index')->with('success', __('keywords.room_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('back.rooms.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $hotels = Hotel::get();

        return view('back.rooms.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();



        if ($request->hasFile('image')) {

            // delete the old image
            storage::delete("public/rooms/$room->image");

            // get image
            $image = $request->image;

            // rename image
            $imageNewName = time() . '_' . $image->getClientOriginalName();

            // store inside my project
            $image->storeAs('rooms', $imageNewName, 'public');

            $data['image'] = $imageNewName;
        }



        $room->update($data);
        return to_route('back.rooms.index')->with('success', __('keywords.room_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        Storage::delete("public/rooms/$room->image");

        $room->delete();
        return to_route('back.rooms.index')->with('success', __('keywords.room_deleted_successfully'));
    }
}
