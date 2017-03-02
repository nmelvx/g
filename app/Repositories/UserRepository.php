<?php
/**
 * Created by PhpStorm.
 * User: Edy
 * Date: 3/2/2017
 * Time: 12:13 AM
 */

namespace App\Repositories;

use App\User;

class UserRepository
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUsersByLevel( $level = 1 )
    {

        return $this->model
            ->whereHas( 'roles', function ($q) use ($level)
                {
                    $q->where('level', $level);
                }
            )
            ->get();

    }

}