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

    public static function convertDateAppointment($job)
    {
        if($job == ''){
            return '<p>Nu aveti programari recente efectuate.</p>';
        }

        $months = ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'];
        $month = date('m');

        return '<p>Urmatoarea programare este pe data de '.date('d').' '.strtolower($months[(int)$month-1]).' ora '.date('H:i', strtotime(!empty($job->time)? $job->time:'')).'</p>';
    }

}