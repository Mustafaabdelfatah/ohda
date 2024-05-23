<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class TypeController extends Controller
{

    
    public function index()
    {
         $types = Type::get();


        // $types = json_decode(json_encode($types));
        return view('dashboard.pages.types.index', compact('types'));
    }


    public function create()
    {
        $types = Type::get();
        return view('dashboard.pages.types.create',compact('types'));
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);

         $attrCountName = Type::where(['name'=>$request->name])->count();

        if($attrCountName>0){
            session()->flash('success', 'هذا النوع موجود من قبل');
            return redirect()->back();
        }

        $type = Type::create($request->all());
        session()->flash('success', 'تم اضافه نوع جديد بنجاح');
        return redirect()->back();

    }



    public function edit($id)
    {
        $types = Type::find($id);
        return view('dashboard.pages.types.edit',compact('types'  ));
    }

    public function update(Request $request, $id)
    {
          

            $validation = $request->validate([
                'name' => 'required|max:255',
            ]);

               // current name
        $oldName = Type::findOrFail($id)->name;

        // update name in transaction
        $nameInItem =  Item::where('type',$oldName)->select('type')->update(['type' =>$request->name]);
 


            $Type = Type::findOrFail($id)->update($request->all());
            session()->flash('success', 'تم التحديث بنجاح');
             return redirect()->route('admin.types.index');

    }


    public function destroy($id)
    {
        try {

            $type = Type::find($id);
            $type->delete();
            session()->flash('success', 'تم حذف النوع بنجاح');
            return redirect()->route('admin.types.index');


        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.types.index');
        }

    }
}
