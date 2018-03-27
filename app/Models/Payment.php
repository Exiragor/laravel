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
//        $payment = new self();
//        $payment->currency_id = $currency->id;
//        $payment->amount = $amount;
//        $payment->status = 'processing';
//        $payment->address = str_random();
//        $payment->save();
//
//        return $payment;
        $status = self::STATUS_PROCESSING;
        $address = str_random();

        $currency->payments()->create(compact('amount', 'status', 'address'));
    }
}
