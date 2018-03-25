<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderByColumn implements Scope
{
    protected $columnName;
    protected $orderBy;
    
    public function __construct($columnName, $orderBy = 'asc')
    {
        $this->columnName = $columnName;
        $this->orderBy = $orderBy;
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