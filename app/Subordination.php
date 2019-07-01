<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subordination extends Model
{
    //
    protected $fillable = [
        'head_id',
        'inferior_id',
        'admin_created_id',
        'admin_updated_id',
    ];
}
