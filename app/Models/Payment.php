<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_PROCESSING = 'processing';

    protected $fillable = [

        'currency_id', 'transaction_id',

        'status', 'amount', 'address',
    ];

    public static function createForCurrency(Currency $currency, string $amount)
    {
        $status = self::STATUS_PROCESSING;
        $address = str_random();

        return $currency->payments()->create(compact('amount', 'status', 'address'));
    }
}
