<?php

namespace App\Http\Controllers\Admin;
use App\Models\Item;
use App\Models\MainPlace;
use App\Models\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class mainPlaceController extends Controller
{

    
    public function index()
    {
         $mainPlaces = MainPlace::orderBy('name')->get();
        return view('dashboard.pages.mainPlaces.index', compact('mainPlaces'));
    }

    public function create()
    {
        $places = MainPlace::get();

        return view('dashboard.pages.mainPlaces.create',compact('places'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);

        $attrCountName = MainPlace::where(['name'=>$request->name])->count();
        if($attrCountName>0){
            session()->flash('success', 'هذا الفرع موجود من قبل');
            return redirect()->back();
        }



        $place = MainPlace::create($request->all());
        session()->flash('success', 'تمت اضافه فرع جديد بنجاح');
        return redirect()->back();

    }

    public function edit($id)
    {
        $places = mainPlace::find($id);
        $transaction = Transaction::where('main_place', $places->name)->get();
        return view('dashboard.pages.mainPlaces.edit',compact('places','transaction', 'id'));
    }

   
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);

          // current name
          $oldName = mainPlace::findOrFail($id)->name;

          // update name in transaction
          $nameInTrans =  Transaction::where('main_place',$oldName)->select('main_place')->update(['main_place' =>$request->name]);
   
  
          
          //  new name
          // return $request->name;

        $place = mainPlace::findOrFail($id)->update($request->all());
        session()->flash('success', 'تم التحديث بنجاح');
            return redirect()->route('admin.main-places.index');
    }
    public function destroy($id)
    {
        try {
            $place = mainPlace::find($id);
            $sub = $place->sub_places();
            $particularTrans =  Transaction::where('main_place',$place->name)->delete();
            $sub->delete();
            $place->delete();
            session()->flash('success', ' تم  حذف الفرع والمحاور التابعه له وكل تفاصيل الاصنافه المرتبطه بالفرع او محاوره ');
            return redirect()->route('admin.main-places.index');


        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.main-places.index');
        }

    }
}
