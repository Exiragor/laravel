<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['date_time', 'hash', 'number', 'currency_id'];
}
