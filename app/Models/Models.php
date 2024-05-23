<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;


class Models extends Model
{
    use HasFactory;


    protected $table = 'models';

    public $timestamps = true;



    protected $fillable = array('name','type_id');



    //relations ----------------------------------
    public function types()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
 
}
