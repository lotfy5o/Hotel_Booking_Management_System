<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::paginate(config('pagination.count'));
        // $admins = $this->getData($request->all());
        return view('back.users.index', get_defined_vars());
    }


    public function create()
    {
        return view('back.users.create', get_defined_vars());
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);


        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return to_route('back.users.index')->with('success', __('keywords.user_created_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        return to_route('back.users.index')->with('success', __('keywords.user_deleted_successfully'));
    }
}
