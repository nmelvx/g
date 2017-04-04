<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stepsOffer extends Controller
{
    public function steps($step = 1)
    {
        switch ($step)
        {
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            default:
                break;
        }

        return view('ask-offer');
    }
}
