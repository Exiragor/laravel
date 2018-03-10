<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Group extends Model
{
    protected $fillable = ['name', 'active', 'rate_amount', 'rate_index', 'rate_profit'];

    public function scopeActive(Builder $query, bool $active = true)
    {
        return $query->where(compact('active'));
    }

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }
}
