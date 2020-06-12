<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['lager'];

    public function storageLocations()
    {
        return $this->hasMany('App\StorageLocation');
    }
}
