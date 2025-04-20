<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_Donation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'bloodgroup',
        'amountofblood',
        'donor_id'
    ];
    protected $table = "company_donation";
}
