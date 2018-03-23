<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'currency_id', 'transaction_id',

        'status', 'amount', 'address',
    ];

    public static function createForCurrency($currency, $amount)
    {
        $payment = new self();
        $payment->currency_id = $currency->id;
        $payment->amount = $amount;
        $payment->status = 'processing';
        $payment->address = str_random();
        $payment->save();

        return $payment;
    }
}
