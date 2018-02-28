<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{

    protected $fillable = [
        'asset_id', 'call_number', 'reason', 'place_date', 'return_date'
    ];

    public function asset() {
        return $this->belongsTo(Asset::Class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::Class);
    }

}
