<?php

namespace App\Http\Controllers\Admin;

use App\Models\BoslaType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class boslaTypeController extends Controller
{

    public function index()
    {
        $types = BoslaType::get();
        return view('dashboard.pages.boslaTypes.index', compact('types'));
    }


    public function create()
    {
        $types = BoslaType::get();
        return view('dashboard.pages.boslaTypes.create',compact('types'));
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);

         $attrCountName = BoslaType::where(['name'=>$request->name])->count();

        if($attrCountName>0){
            session()->flash('success', 'هذا النوع موجود من قبل');
            return redirect()->back();
        }

        $type = BoslaType::create($request->all());
        session()->flash('success', 'تم اضافه نوع جديد بنجاح');
        return redirect()->back();

    }



    public function edit($id)
    {
        $types = BoslaType::find($id);
        return view('dashboard.pages.boslaTypes.edit',compact('types'  ));
    }

    public function update(Request $request, $id)
    {


            $validation = $request->validate([
                'name' => 'required|max:255',
            ]);

               // current name
        // $oldName = BoslaType::findOrFail($id)->name;

        // update name in transaction
        // $nameInItem =  Item::where('type',$oldName)->select('type')->update(['type' =>$request->name]);



            $Type = BoslaType::findOrFail($id)->update($request->all());
            session()->flash('success', 'تم التحديث بنجاح');
             return redirect()->route('admin.bosla-types.index');

    }


    public function destroy($id)
    {
        try {
            $type = BoslaType::find($id);
            $type->delete();
            session()->flash('success', 'تم حذف النوع بنجاح');
            return redirect()->route('admin.bosla-types.index');


        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.bosla-types.index');
        }

    }
}
