<?php

namespace App\Models;
use App\Models\MainPlace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPlace extends Model
{
    use HasFactory;

    protected $table = 'sub_places';

    public $timestamps = true;

    protected $fillable = array('name','master_id');
    //relations ----------------------------------
    public function main_place()
    {
        return $this->belongsTo(MainPlace::class,'master_id');
    }
   
    
}
