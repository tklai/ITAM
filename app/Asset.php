<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'machineName', 'asset_model_id', 'serialNumber', 'vendor_id',
        'orderDate', 'warrantyExpiryDate', 'location_id', 'remarks'
    ];

    public function assetModel() {
        return $this->belongsTo(AssetModel::class);
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
