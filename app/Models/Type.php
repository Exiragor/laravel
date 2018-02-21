<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'value', 'rate_amount', 'rate_index', 'rate_profit', 'active'];
}
