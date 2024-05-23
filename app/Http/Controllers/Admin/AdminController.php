<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   
    public function index()
    {
        $roles = Role::get();
        $admins = Admin::whenRole(request()->role_id)
        ->with('roles')->get();

 
        return view('dashboard.pages.admins.index' , compact('admins','roles'));
    }

    public function create()
    {
        $roles = Role::get();

         return view('dashboard.pages.admins.create',compact('roles'));

    } //end of create

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|min:2|max:250',
            'phone' => 'required|min:6|unique:admins',
            'password' => 'required|min:6',
            'role_id' => 'required|numeric',


        ]);
        $request->merge(['password' => bcrypt($request->password)]);

        $admin = Admin::create($request->all());
        $admin->attachRole($request->role_id);


        session()->flash('success', 'تم اضافه مستخدم جديد بنجاح');
        return redirect()->route('admin.admins.index');

    } //end of store

    public function edit(Request $request, $id)
    {
        $roles = Role::get();

        // GET ELEMENT BY ID
        $admin = Admin::findOrFail($id);

        // $departments = Department::get();


        return view('dashboard.pages.admins.edit', compact('admin','roles'));

    } //end of edit

    public function update(Request $request, $id)
    {

            $validatedData = $request->validate([
            'name' => 'required|min:2|max:250',
            'phone' => 'required|min:6',
            'password' => 'required|min:6',

            ] );

            $admin = Admin::findOrFail($id);
            $request->merge(['password' => bcrypt($request->password)]);

            // return $request->all();
            $admin->update($request->all());
            session()->flash('success', 'تم تحديث المستخدم بنجاح');
            return redirect()->route('admin.admins.index');

    } //end of update

    public function destroy($id)
    {

         $admin = Admin::find($id)->delete();
        session()->flash('success', 'تم حذف المستخدم بنجاح');
        // RETURN INDEX Branch
        return redirect()->route('admin.admins.index');

    } //end of destroy
}
