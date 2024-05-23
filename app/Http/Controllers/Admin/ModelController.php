<?php

namespace App\Http\Controllers\Admin;

use App\Models\Models;
use App\Models\Type;
use App\Models\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ModelController extends Controller
{

    
    public function index()
    {
        

        $items = Item::get();

      

        $arr = [];
        foreach($items as $item){
            $arr[] = $item->model;
        }
        
         $models = Models::with('types')->whereIn('name',$arr)->get();

 
        return view('dashboard.pages.models.index', compact('models'));
    }


    public function create()
    {
        $places = Models::get();
        return view('dashboard.pages.models.create',compact('places'));
    }


    public function store(Request $request)
    {
      
        $validation = $request->validate([
            'name' => 'required|max:255',
        ]);
        
          $attrCountName = Models::where(function($q) use($request){
            
            if( $q->where(['name' => $request->name]) || (['type_id' => $request->type_id]) ){
                return 'as';
            }
          })->count();

         if($attrCountName>0){
            session()->flash('success', 'هذا الطراز موجود من قبل');
            return redirect()->back();
        }
        $models = Models::create($request->all());
        session()->flash('success', 'تمت الاضافه بنجاح');
        return redirect()->route('admin.models.index');
    }

    public function edit($id)
    {
        $models = Models::find($id);
        $types = Type::get();
        return view('dashboard.pages.models.edit',compact('models' , 'types'));
    }


    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
        ]);
        $oldName = Models::findOrFail($id)->name;

        // update name in transaction
        $nameInItem =  Item::where('model',$oldName)->select('model')->update(['model' =>$request->name]);
 
        $place = Models::findOrFail($id)->update($request->all());
        session()->flash('success', 'تم تحديث الطراز بنجاح');
        return redirect()->route('admin.models.index');
    }
    public function destroy($id)
    {
        try {

        
             
             $model = Models::find($id);
            $model->delete();
            session()->flash('success', 'تم الحذف  بنجاح');
            return redirect()->route('admin.models.index');

        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.models.index');
        }

    }
}
