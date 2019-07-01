<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'email',
        'position_id',
        'salary',
        'employment_date',
        'photo',
        'admin_created_id',
        'admin_updated_id',
    ];
}
