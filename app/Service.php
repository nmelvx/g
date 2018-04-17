<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = ['title', 'code', 'price', 'duration'];


    public function jobs()
    {
        return $this->morphedByMany(Jobs::class, 'serviceable');
    }
}
