<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
   


    public function index()
    {
         


        $roles = Role::with('permissions')
            ->withCount('admins')
            ->get();
        return view('dashboard.pages.roles.index', compact('roles'));

    }//end of index

    public function create()
    {
        return view('dashboard.pages.roles.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name',
            'permissions' => 'required|array|min:1',
        ]);



        $role = Role::create($request->all());


        $role->attachPermissions($request->permissions);

        session()->flash('success', 'تم اضافه رول جديد بنجاح');
        return redirect()->route('admin.roles.index');

    }//end of store

    public function edit(Role $role)
    {
        return view('dashboard.pages.roles.edit', compact('role'));

    }//end of edit

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array|min:1',
        ]);

        $role->update($request->all());

        $role->syncPermissions($request->permissions);

        session()->flash('success', 'تم تحديث بنجاح');
        return redirect()->route('admin.roles.index');


    }//end of update

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return redirect()->route('admin.roles.index');

    }//end of destroy
}
