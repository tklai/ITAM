<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'asset_id', 'audit_on'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

}
