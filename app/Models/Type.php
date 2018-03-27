<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Type extends Model
{
    protected $fillable = ['name', 'group_id', 'symbol', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function scopeActive(Builder $query, bool $active = true)
    {
        return $query->where(compact('active'));
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public static function getAmount(Collection $types)
    {
        return $types->load('group')->sum('group.amount');
    }
}
