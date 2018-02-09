<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{

    public $timestamps = false;

    protected $fillable = [
      'name', 'category_id', 'details',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
