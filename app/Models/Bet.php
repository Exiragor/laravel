<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    const TYPE_LETTER = 'letter';
    const TYPE_ODD_NUMBER = 'odd_num';
    const TYPE_EVEN_NUMBER = 'even_num';
    const TYPE_SELECT = 'select';

    protected $fillable = ['winner', 'payment_id', 'currency_id', 'game_id', 'type_id', 'group_id'];

    protected $casts = ['winner' => 'boolean'];

    public static function getTypes() {
        $type_let = self::TYPE_LETTER;
        $type_odd_num = self::TYPE_ODD_NUMBER;
        $type_even_num = self::TYPE_EVEN_NUMBER;
        $type_sel = self::TYPE_SELECT;

        return compact('type_odd_num','type_even_num', 'type_let', 'type_sel');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public static function createForCurrency($currency, $types, $payment)
    {
        $bets = [];
        foreach ($types as $type) {
            $bet = new self();
            $bet->currency_id = $currency['id'];
            $bet->type_id = $type['id'];
            $bet->group_id = $type['group_id'];
            $bet->payment_id = $payment['id'];
            $bet->save();

            $bets[] = $bet->id;
        }

        $bets = Bet::find($bets);
        $bets->load('type');
        $bets->load('group');
        $bets->load('payment');

        return $bets;
    }
}