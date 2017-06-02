<?php

namespace App\Helpers\Helper;

class Helper
{

    public static function userHasAddress($user)
    {
        if(empty($user))
            return false;

        return ($user->address != null && $user->latitude != null && $user->longitude != null)? true:false;
    }

    public static function getDateAppointment($job)
    {
        if($job == ''){
            return '<p>Nu aveti programari recente efectuate.</p>';
        }

        $months = ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'];
        $month = date('m');

        return '<p>Urmatoarea programare este pe data de '.date('d', strtotime(!empty($job->date)? $job->date:'')).' '.strtolower($months[(int)$month-1]).' ora '.date('H:i', strtotime(!empty($job->time)? $job->time:'')).'</p>';
    }

}