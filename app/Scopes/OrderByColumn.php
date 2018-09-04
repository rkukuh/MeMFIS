<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderByColumn implements Scope
{
    protected $orderBy;
    protected $columnName;

    public function __construct($columnName, $orderBy = 'asc')
    {
        $this->orderBy = $orderBy;
        $this->columnName = $columnName;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy($this->columnName, $this->orderBy);
    }
}
