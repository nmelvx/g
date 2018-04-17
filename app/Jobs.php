<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{

    protected $fillable = ['title'];

    public function serviceable()
    {
        return $this->morphMany(Serviceable::class, 'serviceable');
    }
}
