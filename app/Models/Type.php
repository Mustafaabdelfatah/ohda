<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models;


class Type extends Model
{
    use HasFactory;


    protected $table = 'types';

    public $timestamps = true;



    protected $fillable = array('name');



    //relations ----------------------------------

    public function models()
    {
        return $this->hasMany(Models::class);
    }
 

}
