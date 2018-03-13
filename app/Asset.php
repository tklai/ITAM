<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    protected $fillable = [
        'machineName', 'asset_model_id', 'serialNumber', 'vendor_id',
        'orderDate', 'warrantyExpiryDate', 'location_id', 'remarks',
        'audited_on'
    ];

    public function assetModel() {
        return $this->belongsTo(AssetModel::class);
    }

    public function auditLog() {
        return $this->hasMany(AuditLog::class)->orderBy('id', 'DESC')->take(1);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function maintenance() {
        return $this->belongsTo(Maintenance::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }

}
