<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
     
    public function index(Request $request){

        $settings = Setting::get();
        return view('dashboard.pages.settings.index',compact('settings'));
    }
    public function create(){
        $settings = Setting::first();
        return view('dashboard.pages.settings.create',compact('settings'));
    }
    public function store(Request $request){

        if (!$request->has('act') )
        $request->request->add(['act' => 'un_active']);
        else
        $request->request->add(['act' => 'active']);

        $validatedData = $request->validate([
            'recieve' => 'required',
            'side' => 'required',
            'boss' => 'required',
            'degree' => 'required',
            'name' => 'required',
        ]);

        Setting::create($request->all());
        session()->flash('success', 'تم الاضافه بنجاح');
        return redirect()->route('admin.settings.index');


    }

    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('dashboard.pages.settings.edit',compact('settings'));
    }


    public function update(Request $request, $id)
    {



        if (!$request->has('act') )
        $request->request->add(['act' => 'un_active']);
        else
        $request->request->add(['act' => 'active']);

        $settings = Setting::findOrFail($id)->update($request->all());

        session()->flash('success', 'تم التحديث بنجاح');
        return redirect()->route('admin.settings.index');
    }

}
