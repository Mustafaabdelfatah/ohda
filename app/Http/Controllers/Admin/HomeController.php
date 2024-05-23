<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Type;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

// use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    // admin home page
    public function index()
    {
        $types= Type::get();

        $data=[];
        foreach($types as $type) {
              $data[$type->name] = Item::with(['transactions'=> function($q) {
                $q->where('status','!=','old');
            }])->where(['type' => $type->name,'ohda_status' =>'added'])->select('type','id','quantity')->get();
        }

        $not_add=[];
        foreach($types as $type) {
              $not_add[$type->name] = Item::with(['transactions'=> function($q) {
                $q->where('status','!=','old');
            }])->where(['type' => $type->name,'ohda_status' =>'removed'])->select('type','id','quantity')->get();
        }
     
      
       
        return view('dashboard.pages.index',compact('data','not_add'));
    }
    public function getType($type){
        

        $data = Item::with(['transactions'=> function($q) {
            $q->where('status','!=','old');
        }])->where(['type'=>$type,'ohda_status' =>'added'])->get();
     
        return view('dashboard.pages.type',compact('data'));
    }

    public function not($type){

         
        $not = Item::with(['transactions'=> function($q) {
            $q->where('status','!=','old');
        }])->where(['type'=>$type,'ohda_status' =>'removed'])->get();
     
        return view('dashboard.pages.not_add',compact('not'));
    }
}
