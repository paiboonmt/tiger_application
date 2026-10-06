<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id';
    protected $fillable = [
        'group',
        'm_card',
        'p_visa',
        'email',
        'phone',
        'sex',
        'fname',
        'price',
        'pay',
        'fightname',
        'nationalty',
        'birthday',
        'age',
        'discount',
        'vat7',
        'vat3',
        'total',
        'package',
        'dropin',
        'new_package',
        'height',
        'weigh',
        'accom',
        'payment',
        'invoice',
        'vaccine',
        'comment',
        'emergency',
        'sta_date',
        'exp_date',
        'expired',
        'tenure',
        'type_training',
        'type_fighter',
        'sponsored',
        'commission',
        'mealplan_month',
        'affiliate',
        'facebook',
        'instagram',
        'status',
        'image',
        'AddBy',
        'code',
        'status_code',
        'date',
    ];
}
