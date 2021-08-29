<?php

namespace RoseBub;

abstract class Controller{

    private const MIN_PHP_VERSION = '7.3';


    function __construct(){

        if (version_compare(PHP_VERSION, self::MIN_PHP_VERSION, '<'))
		{
            die(sprintf('CORE ERROR : Your PHP version must be %s or higher to run CodeIgniter. Current version: %s', self::MIN_PHP_VERSION, PHP_VERSION));
		}
        
    }
}