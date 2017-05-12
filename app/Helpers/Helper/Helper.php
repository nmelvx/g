<?php

namespace App\Helpers\Helper;

class Helper
{

    public function userHasAddress($user)
    {
        if(empty($user))
            return false;

        return ($user->address != null && $user->latitude != null && $user->longitude != null)? true:false;
    }

}