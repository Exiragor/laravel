<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function scopeActive(Builder $query, bool $active = true)
    {
        return $query->where(compact('active'));
    }
}
