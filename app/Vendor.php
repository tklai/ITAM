<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'address', 'phone'
    ];
}
