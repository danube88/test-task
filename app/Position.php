<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable = [
        'name_position',
        'default_salary',
        'admin_created_id',
        'admin_updated_id',
    ];
}
