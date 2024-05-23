<?php

namespace App\Models;
use App\Models\SubPlace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPlace extends Model
{
    use HasFactory;

    protected $table = 'main_places';

    public $timestamps = true;

    protected $fillable = array('name' );

    //relations ----------------------------------
    public function sub_places()
    {
        return $this->hasMany(SubPlace::class,'master_id');
    }

       
}
