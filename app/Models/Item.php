<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = array('type','not_serial','model','document','page','description','boslatype_id','ohda_status','bosla','date' ,'quantity' );

    protected $dates = ['deleted_at'];


    protected $table = 'items';

    protected $casts = [
        'document' => 'array',      
        'date' => 'array',      
    ];

    public $timestamps = true;


    public function transactions(){

    	return $this->hasMany('App\Models\Transaction','item_id')->orderBy('main_place','asc');

    }

     // relations
     public function boslatype()
     {
         return $this->belongsTo('App\Models\BoslaType','boslatype_id');
     }

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function place(){
        return $this->belongsTo('App\Models\MainPlace');
    }


    public function getSetuation(){
        if($this->ohda_status == 'added'){
            return "مضاف";
        }else{
            return "غير مضاف";
        }
    }

    public function getStatus(){
        if($this->bosla == 'active'){
            return "موجود في البوصله";
        }else{
            return "غير موجود في البوصله";
        }
    }




}
