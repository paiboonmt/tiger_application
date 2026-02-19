<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'pay_id';
    protected $fillable = [
        'pay_name',
        'value',
    ];
}
