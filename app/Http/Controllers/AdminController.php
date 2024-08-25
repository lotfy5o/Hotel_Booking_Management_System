<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StoreAdminRequest;


class AdminController extends Controller
{

    public function getData($data)
    {
        $order   = $data['order'] ?? 'created_at';
        $sort    = $data['sort'] ?? 'desc';
        $perpage = $data['perpage'] ?? \config('app.paginate');
        $start   = $data['start'] ?? null;
        $end     = $data['end'] ?? null;
        $word    = $data['word'] ?? null;

        $data = Admin::when($word != null, function ($q) use ($word) {
            $q->where('name', 'like', '%' . $word . '%')
                ->orWhere('email', 'like', '%' . $word . '%');
        })
            ->when($start != null, function ($q) use ($start) {
                $q->whereDate('created_at', '>=', $start);
            })
            ->when($end != null, function ($q) use ($end) {
                $q->whereDate('created_at', '<=', $end);
            })
            ->orderby($order, $sort)->paginate($perpage);

        return \get_defined_vars();
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = Admin::paginate(config('pagination.count'));
        // $admins = $this->getData($request->all());
        return view('back.admins.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return view('back.admins.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // instead of validating inside the controller use a StoreAdminRequest
        // the problem is the encryption of the column 'password' column is by using the password() function,
        //check it at the Admin model.


        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['nullable'],
        ]);


        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // I didn't  add the 'role' column to tho the create funtction cuz the admins table
        // doesn't have a column for roles, I am using the assignRole methode to make a relationship
        if (isset($data['role'])) $admin->assignRole($data['role']);




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
    public function update(Request $request, Admin $admin)
    {
        // form request is better since u can use the attribute function to do localization
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['nullable'],
        ]);

        // you could just omits field from updating [example: password] by doing this check:
        // if ($data['password'] == null) unset($data['password']);



        $admin->update($data);
        return to_route('back.admins.index')->with('success', __('keywords.admin_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {

        $admin->delete();
        return to_route('back.admins.index')->with('success', __('keywords.admin_deleted_successfully'));
    }
}
