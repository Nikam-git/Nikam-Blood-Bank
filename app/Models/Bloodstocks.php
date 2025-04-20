<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloodstocks extends Model
{
    protected $fillable=[
        'bloodgroupAplus',
        'bloodgroupBplus',
        'bloodgroupOplus',
        'bloodgroupAminus',
        'bloodgroupBminus',
        'bloodgroupOminus',
        'bloodgroupABplus',
        'bloodgroupABminus'
    ];
    protected $table="blood_stocks";
}
