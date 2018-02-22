<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'date_time',
        'amount', 'from_address', 'to_address', 'hash'
    ];
}
