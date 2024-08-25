<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BackHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $admins = Admin::all();
        $users = User::all();
        $hotels = Hotel::all();
        $rooms = Room::all();
        return view('back.index', get_defined_vars());
    }
}
