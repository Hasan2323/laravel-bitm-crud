<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'mobile', 'bloodGroup', 'gender', 'location', 'lastDonationDate', 'member', 'summary',
    ];
}
