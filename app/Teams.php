<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{

    protected $fillable = ['name', 'user_id'];

    /*public function members()
    {
        return $this->hasMany(TeamMembers::class, 'team_id', 'id');
    }*/


    public function members()
    {
        return $this->belongsToMany(User::class, 'team_members', 'team_id', 'user_id');
    }
}
