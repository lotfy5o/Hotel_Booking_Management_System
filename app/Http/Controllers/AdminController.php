<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Validation\Rules;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(config('pagination.count'));
        return view('back.admins.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);


        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);




        return to_route('back.admins.index')->with('success', __('keywords.admin_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('back.admins.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('back.admins.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateAdminRequest $request, Admin $Admin)
    // {
    //     $data = $request->validated();



    //     $Admin->update($data);
    //     return to_route('admin.admins.index')->with('success', __('keywords.Admin_updated_successfully'));
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {

        $admin->delete();
        return to_route('back.admins.index')->with('success', __('keywords.admin_deleted_successfully'));
    }
}
