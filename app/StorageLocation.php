<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageLocation extends Model
{
    protected $fillable = ['lagerort', 'warehouse_id'];

    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }

    public function storagePlaces()
    {
        return $this->hasMany('App\StoragePlace');
    }
}
