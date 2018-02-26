<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    const TYPE_LETTER = 'letter';
    const TYPE_ODD_NUMBER = 'odd_num';
    const TYPE_EVEN_NUMBER = 'even_num';
    const TYPE_SELECT = 'select';

    protected $fillable = ['winner'];

    protected $casts = ['winner' => 'boolean'];

    public static function getTypes() {
        $type_let = self::TYPE_LETTER;
        $type_odd_num = self::TYPE_ODD_NUMBER;
        $type_even_num = self::TYPE_EVEN_NUMBER;
        $type_sel = self::TYPE_SELECT;

        return compact('type_odd_num','type_even_num', 'type_let', 'type_sel');
    }


}