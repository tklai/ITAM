<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'orderNumber', 'deliveryDate', 'warrantyExpiryDate',
        'vendor_id', 'type', 'remarks'
    ];

}
