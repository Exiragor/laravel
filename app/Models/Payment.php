<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'currency_id', 'transaction_id',

        'status', 'amount', 'address',
    ];
}
