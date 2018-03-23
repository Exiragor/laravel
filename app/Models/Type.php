<?php

namespace App\Models;

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

    public static function getAmount($types)
    {
        $amount = 0;
        foreach ($types as $type) {
            $group = Group::find($type['group_id']);
            $amount += $group->amount;
        }

        return $amount;
    }
}
