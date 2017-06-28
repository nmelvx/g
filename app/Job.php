<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = ['title', 'date', 'time', 'area', 'sum', 'total_duration', 'address', 'observations', 'team_id', 'user_id'];


    public function services()
    {
        return $this->morphToMany(Service::class, 'serviceable')->withTimestamps();
    }

    public function team()
    {
        return $this->hasOne(Teams::class, 'id', 'team_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
