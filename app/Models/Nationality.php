<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = 'tb_nationality';
    protected $primaryKey = 'nationality_id';
    protected $fillable = [
        'n_name',
    ];
}
