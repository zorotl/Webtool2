<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoragePlace extends Model
{
    protected $fillable = ['lagerplatz', 'storage_location_id'];

    public function storage_locations()
    {
        return $this->belongsTo('App\StorageLocation');
    }
}
