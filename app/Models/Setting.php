<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = array('degree','recieve','side','boss','act','name','take_degree','take_name','take_num_mil');

    use HasFactory;

    public function status(){
        if($this->act == 'active'){
            return "فعال";
        }else{
            return "غير فعال";
        }
    }

}
