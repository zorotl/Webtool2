<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageLocation extends Model
{
    protected $fillable = ['lagerort', 'warehouse_id'];

    public function warehouses()
    {
        return $this->belongsTo('App\Warehouse');
    }

    public function storage_places()
    {
        return $this->hasMany('App\StoragePlace');
    }
}
