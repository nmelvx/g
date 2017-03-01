<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{

    public function members()
    {
        return $this->hasMany(TeamMembers::class, 'team_id', 'id');
    }
}
