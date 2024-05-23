<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubPlace;
use App\Models\MainPlace;
use App\Models\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class subPlaceController extends Controller
{

    
    public function index()
    {
        
        $places = SubPlace::with('main_place')->get(); 
        return view('dashboard.pages.subplaces.index', compact('places'));
    }


    public function create()
    {
        $places = MainPlace::get();
        return view('dashboard.pages.subplaces.create',compact('places'));
    }


    public function store(Request $request)
    {
        $request->all();
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);
        $attrCountName = SubPlace::where(function($q) use($request){
            
            if( $q->where(['name' => $request->name]) || (['master_id' => $request->master_id]) ){
                return 'as';
            }
          })->count();
       
         if($attrCountName>0){
            session()->flash('success', 'هذا المحور موجود من قبل');
            return redirect()->back();
        }

        $place = subPlace::create($request->all());
        session()->flash('success', 'تمت الاضافه بنجاح');
        // return redirect()->route('admin.sub-places.index');
        return redirect()->back();
    }

    public function edit($id)
    {
        $places = subPlace::find($id);
        $mainPlaces = MainPlace::get();
        return view('dashboard.pages.subplaces.edit',compact('places' , 'mainPlaces'));
    }


    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);

        // current name
        $oldName = subPlace::findOrFail($id)->name;

        // update name in transaction
        $nameInTrans =  Transaction::where('sub_place',$oldName)->select('sub_place')->update(['sub_place' =>$request->name]);
 

        
        //  new name
        // return $request->name;
        // return $request->all();
        // update subplace
        $place = subPlace::findOrFail($id)->update($request->all());
        session()->flash('success', 'تم التحديث بنجاح');
        return redirect()->route('admin.sub-places.index');
    }
    public function destroy($id)
    {
        try {

            
            $place = subPlace::find($id);
            $particularTrans =  Transaction::where('sub_place',$place->name)->delete();

            $place->delete();
            session()->flash('success', 'تم حذف المحور وكل تفاصيل الاصناف المرتبطه  به ');
            return redirect()->route('admin.sub-places.index');

        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.sub-places.index');
        }

    }
}
