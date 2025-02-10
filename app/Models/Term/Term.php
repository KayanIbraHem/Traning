<?php

namespace App\Models\Term;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Term extends Model
{
    protected $table = 'terms';

    protected $guarded = [];
    public function scopeSearch(Builder $builder): Builder
    {
        return $builder;
    }
    public function scopePerOrganization(Builder $builder): Builder
    {
        return $builder;

        // return $builder->when(auth('employee')->check(), function ($query) {
        // return $query->where('organization_id', authEmployee()->organization_id)->orderBy('id', 'DESC')->search();
        // });
    }
}
