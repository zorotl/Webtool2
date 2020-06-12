<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['lager'];

    public function storage_locations()
    {
        return $this->hasMany('App\StorageLocation');
    }
}
