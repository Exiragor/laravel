<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Type extends Model
{
    protected $fillable = [
        'name', 'value', 'active',
        'rate_amount', 'rate_index', 'rate_profit'
    ];

    protected $casts = ['active' => 'boolean'];

    public function scopeActive(Builder $query, bool $active = true)
    {
        return $query->where(compact('active'));
    }
}
