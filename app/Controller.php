<?php

namespace App;

use DateTime;
use Throwable;
use DateTimeZone;

abstract class Controller{

    private const MIN_PHP_VERSION = '7.3';


    function __construct()
    {
        if (version_compare(PHP_VERSION, self::MIN_PHP_VERSION, '<'))
		{
            die(sprintf('CORE ERROR : Your PHP version must be %s or higher to run. Current version: %s', self::MIN_PHP_VERSION, PHP_VERSION));
		}        
    }


    function dateChangeFormat($datetime, $formatIn='', $formatOut='', $timezone='')
    {        

        if( empty($formatIn) ){
            $formatIn = "Y-m-d H:i:s";
        }

        $date = DateTime::createFromFormat($formatIn, $datetime);

        if( !empty($timezone) ){
            $date->setTimezone(new DateTimeZone($timezone));
        }

        if( empty($formatOut) ){
            $formatOut = "Y-m-d H:i:s";
        }

        try{
            $return = $date->format($formatOut);
        } catch (Throwable $e) {
            echo '<br /><div style="padding:2px;background-color: orange">Main Controller function dateChangeFormat : no coherence date / format';
            echo "<br />Date: $datetime, format in: $formatIn, format out: $formatOut, Timezone: $timezone</div>";
            echo '<br /><br /><div style="padding:2px;background-color: silver">'.$e.'</div>';
            exit();
        }

        return($return);
    }
}