<?php

namespace App\Scopes\Transaction;

use QueryWatcher\Contracts\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MainPlaceScope implements Scope
{
    public $mainPlace;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('main_place', 'like', '%' . $this->mainPlace . '%');
    }
}
