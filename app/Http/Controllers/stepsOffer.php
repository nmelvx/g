<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stepsOffer extends Controller
{
    public function steps(Request $request, $step = 1)
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

        $post = $request->all();

        return view('ask-offer', compact('post'));
    }
}
