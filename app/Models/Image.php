<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    protected $fillable = ['name', 'type'];

    public function imageable(){
        return $this->morphTo();
    }

    use HasFactory;
}