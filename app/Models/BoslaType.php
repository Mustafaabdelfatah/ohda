<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoslaType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item','boslatype_id');
    }

    use HasFactory;
}
