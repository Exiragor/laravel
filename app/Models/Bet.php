<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    const TYPE_LETTER = 'letter';
    const TYPE_NUMBER = 'number';
    const TYPE_CONCRETE_LETTER = 'concrete_letter';
    const TYPE_CONCRETE_NUMBER = 'concrete_number';

    public static function getTypes() {
        return [];
    }
}