<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Type;
use App\Models\Models;
use App\Models\SubPlace;
use App\Models\BoslaType;
use App\Models\MainPlace;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::with('transactions')
            ->orderBy('type', 'desc')
            ->get();

        // items = DB::table('items')->with('transactions')->select('main_place')->distinct()->get();

        return view('dashboard.pages.items.index', compact('items'));
    }

  
    public function create()
    {
        $items = Item::get();
        $types = Type::get();
        $boslaType = BoslaType::get();

        return view('dashboard.pages.items.create', compact('items', 'types', 'boslaType'));
    }

    public function store(Request $request)
    {
         
        if ($request->isMethod('post')) {
            if (!$request->has('bosla')) {
                $request->request->add(['bosla' => 'un_active']);
            } else {
                $request->request->add(['bosla' => 'active']);
            }

            if (!$request->has('not_serial')) {
                $request->request->add(['not_serial' => 'un_active']);
            } else {
                $request->request->add(['not_serial' => 'active']);
            }

            $item = Item::create($request->all());
     
            session()->flash('success', 'تم الاضافه  بنجاح');
            return redirect()->route('admin.items.index');
        }
    }

    public function edit($id)
    {
        $items = Item::find($id);
        
      
        $types = Type::get();
        $boslaType = BoslaType::get();

        return view('dashboard.pages.items.edit', compact('items', 'types','boslaType'));
    }

    public function update(Request $request, $id)
    {
         
        if (!$request->has('bosla')) {
            $request->request->add(['bosla' => 'un_active']);
        } else {
            $request->request->add(['bosla' => 'active']);
        }

        if (!$request->has('not_serial')) {
            $request->request->add(['not_serial' => 'un_active']);
        } else {
            $request->request->add(['not_serial' => 'active']);
        }

        $items = Item::findOrFail($id)->update($request->all());

        session()->flash('success', 'تم التحديث بنجاح');
        return redirect()->route('admin.items.index');
    }
    
    public function destroy($id)
    {
        try {
            $item = Item::find($id);
            $transction = $item->transactions();
            $item->delete();
            $transction->delete();
            session()->flash('success', 'تم حذف الصنف بتفاصيله بنجاح   ');
            return redirect()->route('admin.items.index');
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->route('admin.items.index');
        }
    }

   
    public function getmodel(Request $request, $id)
    {
        return response()->json(
            [
                'data' => Models::where('type_id', $id)->get(),
            ],
            200,
        );
    }

    public function getPlace(Request $request, $id)
    {
        // return DB::table("places")->where("parent_id", $id)->get(['id', 'name','parent_id']);
        return response()->json(
            [
                'data' => SubPlace::where('master_id', $id)->get(),
            ],
            200,
        );
    }

    public function attribute(Request $request, $id = null)
    {
    

         $itemDetails = Item::with(['transactions' =>function($q) {
            $q->where('status','!=','old');
         }])->where(['id' => $id])->first();

        // $itemDetails = $itemDetails->transactions()->where('status' , '=', 'old')->first();

        $transaction = Transaction::where('item_id', $id)->where('status' , '!=' , 'old')->count();

        $places = MainPlace::get();

        return view('dashboard.pages.items.item_attributes')->with(compact('itemDetails', 'places', 'transaction'));
    }

    public function addDetails(Request $request, $id = null)
    {
        $qty_of_item = Item::with('transactions')
            ->where('id', $id)
            ->first()->quantity;
        // عدد التفاصيل الخاصه بال صنف
        $count = Transaction::where('item_id', $id)->count();

        if ($count < $qty_of_item) {
            $data = $request->all();
            for ($i = 0; $i < count($data['main_place']); $i++) {
                $attr = Transaction::create([
                    'sn' => $request->sn == null ? null : $data['sn'][$i],
                    'item_id' => $id,
                    'main_place' => $data['main_place'][$i],
                    'sub_place' => $data['sub_place'][$i],
                    'ram' => $data['ram'][$i],
                    'hd' => $data['hd'][$i],
                    'cpu' => $data['cpu'][$i],
                    'quantity' => $data['quantity'][$i],
                    'status' => $data['status'][$i],
                    'screen_type' => $data['screen_type'][$i],
                    'screen_serial' => $data['screen_serial'][$i],
                ]);
            }
            session()->flash('success', 'تمت اضافه التفاصيل بنجاح');
            return redirect('items/details/' . $id);
        } else {
            session()->flash('success', 'لقد قمت باضافه الكميه المطلوبه بالكامل');
            return redirect()->back();
        }
    }

     
    public function updateDetails(Request $request, $id = null)
    {
        $trans = Transaction::findOrFail($request->item_id);
        $trans->update([
            'sn' => $request->sn,
            'main_place' => $request->main_place,
            'sub_place' => $request->sub_place,
            'ram' => $request->ram,
            'hd' => $request->hd,
            'cpu' => $request->cpu,
            'screen_type' => $request->screen_type,
            'screen_serial' => $request->screen_serial,
            'quantity' => $request->quantity,
            // 'status'=>$request->status,
        ]);
        if($id){
            session()->flash('success', 'تمت تحديث التفاصيل بنجاح');
            return redirect('main-places/' . $id . '/edit');
        }else{
            session()->flash('success', 'تمت تحديث التفاصيل بنجاح');
            return redirect()->back();
        }
    }


    public function editDetails(Request $request, $id = null)
    {
        // return $request->status;

        $trans = Transaction::findOrFail($request->item_id);
        $trans->update([
            'sn' => $request->sn,
            'main_place' => $request->main_place,
            'sub_place' => $request->sub_place,
            'ram' => $request->ram,
            'hd' => $request->hd,
            'cpu' => $request->cpu,
            'screen_type' => $request->screen_type,
            'screen_serial' => $request->screen_serial,
            'quantity' => $request->quantity,
            // 'status'=>$request->status,
        ]);
        if($id){
            session()->flash('success', 'تمت تحديث التفاصيل بنجاح');
            return redirect('items/details/' . $id);
        }else{
            session()->flash('success', 'تمت تحديث التفاصيل بنجاح');
            return redirect()->back();
        }
    }

    public function deleteAttribute($id)
    {
          Transaction::find($id)->delete();
        // return session with success msg
        session()->flash('success', 'تم حذف تفاصيل الصنف بنجاح');
        // RETURN INDEX PAGE
        return back();
    }

    public function changeStatus(Request $request)
    {
        $curtrans = Transaction::find($request->status_id);
        $curtrans->update(['status' => $request->status]);
        if($curtrans->status == 'old'){
         $transaction =  Transaction::find($request->status_id);
            $transaction->update([
                'main_place' => null,
                'sub_place' => null,
            ]);      
        }

        session()->flash('success', ' تم تغيير الحاله بنجاح وازاله الصنف من الفرع الخاص به');
        // RETURN INDEX PAGE
        return back();
    }
    public function delete($id)
    {

        $transaction = Transaction::find($id)->delete();
        return redirect()->back();
    }
    public function trash(){
        $trash = Transaction::with('item')->onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('dashboard.pages.items.trashed')->with(compact('trash'));
    }
    public function force($id){
        $transaction = Transaction::where('id',$id)->forceDelete();
        session()->flash('success', 'تم الحذف النهائي بنجاح');
        // RETURN INDEX PAGE
        return back();
    }
    public function restore($id){

        $restore = Transaction::where('id',$id)->restore();
        session()->flash('success', 'تم استرجاع الصنف بنجاح');
        // RETURN INDEX PAGE
        return back();

    }
      public function specific($id){
        $items = Item::find($id);
        // dd($items);
       return view('dashboard.pages.items.details',compact('items'));
   }

   
}
