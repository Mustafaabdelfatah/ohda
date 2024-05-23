<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\Models;
use App\Models\Setting;
use App\Models\SubPlace;
use App\Models\BoslaType;
use App\Models\MainPlace;
use App\Models\Transaction;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $main_place = MainPlace::get();

        $main_place_ids = MainPlace::pluck('id')->toArray();
        $sub_place = SubPlace::whereIn('master_id', $main_place_ids)->get();
        $data = Transaction::with('item');
        $types = Type::get();
        if ($request->has('main_place')) {
            $data->where('main_place', 'like', '%' . $request->main_place . '%');
        }
        if ($request->has('sub_place')) {
            $data->whereIn('sub_place', $request->sub_place );
        }
        $data = $data->get();
        $subset = $data->map(function ($sub) {
            return collect($sub->toArray())
                ->only([ 'sub_place'])
                ->all();
        });
        $subtest = $subset->toArray();
        $test = Arr::flatten($subtest);
        $arr = array_unique($test);

        return view('dashboard.pages.reports.index', [
            'main_places' => $main_place,
            'sub_place' => $sub_place,
            'items' => $data,
            'types' => $types,
            'arr' => $arr,
        ]);



    }

    public function convertToPdf(Request $request)
    {


        $main = $request->mainPlace;
        $sub = $request->subPlace;



         $settings = Setting::where('act', 'active')->first();

        $data = Transaction::with('item');

        // dd($request->all());
        if ($request->has('mainPlace')) {
            $data->where('main_place', 'like', '%' . $request->mainPlace . '%');
        }

        if ($request->has('subPlace')) {
            $data->whereIn('sub_place', $request->subPlace );
        }




        $data = $data->get();
        // dd($data);
        $todayDate = Carbon::now()->format('Y-m-d');



        // dd($sub);
        $pdf = PDF::loadView('dashboard.pages.reports.pdf', [
            'main' => $main,
            'sub' => $sub,
            'data' => $data,
            'settings' => $settings,
            'date' =>$todayDate
        ])->setOrientation('landscape')->setPaper('a4')->setOption('margin-bottom', 0);

        return $pdf->download('Reports.pdf');

    }

    public function all(Request $request)
    {
        $array = [];
        $main_place = MainPlace::get();

        foreach ($main_place as $place) {
            $array[] = $place->id;
        }

        $sub_place = SubPlace::whereIn('master_id', $array)->get();

        return view('dashboard.pages.reports.all', [
            'main_places' => $main_place,
            'sub_place' => $sub_place,
        ]);
    }

    public function specificData(Request $request)
    {
        $item = Transaction::with('item');

        if ($request->has('main_place')) {
            $item->where('main_place', 'like', '%' . $request->main_place . '%');
        }

        if ($request->has('sub_place')) {
            $item->where('sub_place', 'like', '%' . $request->sub_place . '%');
        }

        $items = $item->get();

        return view('dashboard.pages.reports.specific', [
            'items' => $items,

        ]);
    }

    public function added()
    {
        $types = Type::get();
        $array = [];

        foreach ($types as $type) {
            $array[] = $type->id;
        }

        $model = Models::whereIn('type_id', $array)->get();

        return view('dashboard.pages.reports.added', compact('types', 'model'));
    }

    public function doadded(Request $request)
    {

        $type = $request->type;
        $model = $request->model;

        $item = Item::with('transactions')->where('ohda_status', 'added');

        if ($request->has('type')) {
            $item->where('type', 'like', '%' . $request->type . '%');
        }

        if ($request->has('model')) {
            $item->where('model', 'like', '%' . $request->model . '%');
        }

         $items = $item->orderBy('type', 'asc')->get();

        // return view('dashboard.pages.reports.doadded',[

        //     'items' => $items,
        //     'type' => $type,
        //     'model' => $model,

        // ]);

        $pdf = PDF::loadView('dashboard.pages.reports.doadded', [
            'items' => $items,
            'type' => $type,
            'model' => $model,


        ])->setOrientation('portrait')->setPaper('a4')->setOption('margin-bottom', 0);

        return $pdf->download('Reports.pdf');

    }
    public function notadded()
    {

        $types = Type::get();
        $array = [];
        foreach ($types as $type) {
            $array[] = $type->id;
        }

        $model = Models::whereIn('type_id', $array)->get();
        return view('dashboard.pages.reports.notadded', compact('types', 'model'));
    }

    public function notdoadded(Request $request)
    {



        $type = $request->type;
        $model = $request->model;

        $item = Item::with('transactions')->where('ohda_status', 'removed');

        if ($request->has('type')) {
            $item->where('type', 'like', '%' . $request->type . '%');
        }

        if ($request->has('model')) {
            $item->where('model', 'like', '%' . $request->model . '%');
        }

        $items = $item->orderBy('type', 'asc')->get();

        $pdf = PDF::loadView('dashboard.pages.reports.notdoadded', [
            'items' => $items,
            'type' => $type,
            'model' => $model,
        ])->setOrientation('portrait')->setPaper('a4')->setOption('margin-bottom', 0);

        return $pdf->download('Reports.pdf');
    }
    public function old()
    {

        $oldTrans = Transaction::with('item')->where('status', 'old')->get();
        return view('dashboard.pages.reports.old', compact('oldTrans'));
    }
    public function oldpdf(Request $request)
    {
         $oldTrans = Transaction::with(['item' => function($q){
            $q->orderBy('type', 'asc');
         }])->where('status', 'old')->get();

        $pdf = PDF::loadView('dashboard.pages.reports.doOld', [
            'oldTrans' => $oldTrans,
        ])->setOrientation('portrait')->setPaper('a4')->setOption('margin-bottom', 0);
        return $pdf->download('Reports.pdf');
    }

    public function bosla()
    {
        $types = BoslaType::get();

        return view('dashboard.pages.reports.bosla', compact('types'));
    }

    public function boslapdf(Request $request)
    {

        $query = Item::with('transactions')->where(['bosla' => 'active']);

        if ($request->has('boslatype_id')) {
            $query->where('boslatype_id', 'like', '%' . $request->boslatype_id . '%');
        }

        $bosla = BoslaType::find($request->boslatype_id);

         $items = $query->orderBy('type', 'asc')->get()->groupBy('type');



        $pdf = PDF::loadView('dashboard.pages.reports.boslapdf',[
        'items' => $items,
        'bosla' => $bosla,

        ])->setOrientation('portrait')->setPaper('a4')->setOption('margin-bottom', 0);

        // return view('dashboard.pages.reports.boslapdf', compact('items', 'bosla'));

        return $pdf->download('Reports.pdf');
    }
    public function type()
    {
        $main_place = MainPlace::get();
        $types = Type::get();

        return view('dashboard.pages.reports.type', [
            'main_places' => $main_place,
            'types' => $types,
        ]);
    }

    public function typepdf(Request $request)
    {

        $main = $request->main_place;
        $sub = $request->sub_place;
        $type = $request->type;
        $model = $request->model;

        $data = Transaction::whereHas('item', function ($query) use($request) {
            $query->where('type', 'like', '%'.$request->type.'%')->Where('model','like','%'.$request->model.'%');
           });


          if ($request->has('main_place')) {
              $data->where('main_place', 'like', '%' . $request->main_place . '%');
          }
          if ($request->has('sub_place')) {
              $data->where('sub_place', 'like', '%' . $request->sub_place . '%');
          }



          $data = $data->get();

          $pdf = PDF::loadView('dashboard.pages.reports.typepdf',[
            'data' => $data,
            'main' => $main,
            'sub' => $sub,
            'type' => $type,
            'model' => $model,

            ])->setOrientation('portrait')->setPaper('a4')->setOption('margin-bottom', 0);


            return $pdf->download('Reports.pdf');




    }
}
