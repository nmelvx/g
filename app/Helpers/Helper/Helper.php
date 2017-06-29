<?php

namespace App\Helpers\Helper;

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

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

    public static function formatDate($date)
    {

        setlocale(LC_TIME, ['ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2']);

        return strftime('%A %d, %B %Y', strtotime($date));
    }

    public static function durationFormat($duration)
    {

        $hours = floor($duration / 3600);
        $minutes = floor(($duration / 60) % 60);
        $seconds = $duration % 60;

        $stringHours = '';
        if($hours > 0){
            $stringHours .= (($hours > 1)? $hours.' ore si ':$hours.' ora si ');
        }
        return 'aproximativ '.$stringHours.(($minutes > 1)?  $minutes.' minute':$minutes.' minut');

    }

    public static function getImage( $template, $src, $location = 'images' )
    {
        if( empty($src) ) {
            $location = 'images';
            $src  = 'empty.jpg';
        }

        $size = Config::get( 'imageconfig.'.$template );

        if ( file_exists( public_path( $location.'/' ).$template.'/'.$src ) ) {
            return asset( $location.'/'.$template.'/'.$src );

        } else {

            if ( !file_exists( public_path($location.'/').$template ) ) {
                mkdir( public_path( $location.'/' ).$template, 0755, true );
            }

            if ($src == 'empty.jpg')
                $filePath = storage_path( 'uploads/'.$src );
            else
                $filePath = storage_path( 'uploads/'.$location.'/'.$src );

            if (!is_file($filePath)) {
                return self::getImage($template, '', $location);
            }

            $img = Image::make($filePath)->fit( $size[0], $size[1] );

            try {
                $img->save( public_path( $location.'/' ).$template.'/'.$src );
            } catch (Exception $e ) {
                return self::getImage( $template, '', $location );
            }

            return asset( $location.'/'.$template.'/'.$src );
        }
    }

}