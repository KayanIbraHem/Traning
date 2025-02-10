<?php

namespace App\Services\Term;


use App\Bases\CrudOperation\CrudOperationBase;

class TermService extends CrudOperationBase
{
    protected string $model = 'App\\Models\\Term\\Term';
}
