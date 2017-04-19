<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = ['title'];


    public function services()
    {
        return $this->morphToMany(Service::class, 'serviceable')->withTimestamps();
    }


}
