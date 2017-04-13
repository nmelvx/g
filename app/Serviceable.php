<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serviceable extends Model
{

    protected $fillable = array('service_id', 'serviceable_id', 'serviceable_type');

    public function serviceable()
    {
        return $this->morphTo();
    }
}
