<?php

namespace App\Http\Filters;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param User $builder
     * @param QueryFilter $filter
     */
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
}