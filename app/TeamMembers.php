<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    public function userInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function team()
    {
        return $this->belongsToMany(User::class, 'team_members', 'team_id', 'user_id');
    }
}
