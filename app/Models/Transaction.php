<?php

namespace App\Models;

use QueryWatcher\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, Scopable;
    use SoftDeletes;

    protected $table = 'transactions';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'main_place', 'sub_place', 'quantity', 'sn', 'ram', 'hd', 'cpu', 'item_id', 'status', 'created_at', 'updated_at','screen_type', 'screen_serial',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id')->orderBy('type', 'asc');
    }
    //scopes --------------------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('main_place', 'like', "%$search%")
                ->orWhere('sub_place', 'like', "%$search%");
        });

    } // end of scopeWhenSearch

    public function getStatus()
    {
        if ($this->status == 'new') {
            return "جديد";
        } elseif ($this->status == 'used') {
            return "مستخدم";
        } else {
            return "كهنه";
        }
    }
}
