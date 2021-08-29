<?php

$executionTimeStart = hrtime(true); 

define('DIR_WEB',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('DIR_PUBLIC',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
include_once(DIR_PUBLIC.'config.php');

if(empty($app_config['dir_root'])){
	$app_config['dir_root'] = '..';
}

define('DIR_ROOT',$app_config['dir_root']);
require_once(DIR_ROOT.'/vendor/autoload.php');

define('DIR_APP',DIR_ROOT.'/src/rosebub');
require_once(DIR_APP.'/helpers/url.php');




if( $app_config['app_env'] == 'dev' ){
	ini_set('display_errors',1);
	ini_set('error_reporting', E_ALL);
	ini_set('display_startup_errors',1);
	ini_set('html_errors',1);
}
else{
	ini_set('display_errors',0);
	ini_set('display_startup_errors',0);
	ini_set('html_errors',0);
}



session_start();


$module = $app_config['module_default'];
$action = 'index';
$id = '';
$lang = $app_config['lang_default'];

if( isset($_REQUEST['q']) ){
	$params = explode("/",$_REQUEST['q']);
	$lang = !empty($params[0]) ? $params[0] : null;
	$module = !empty($params[1]) ? $params[1] : null;
	$action = !empty($params[2]) ? $params[2] : null;
	$id = !empty($params[3]) ? $params[3] : null;
}



//language
if( file_exists(DIR_PUBLIC.'languages/'.$lang.'.php') ){
	require_once(DIR_PUBLIC.'languages/'.$lang.'.php');
}
else{
	die('Language '.$lang.' not found');
}



//Module
if( empty($module) || ($app_config['module_default']=='auth' && empty($_SESSION['user_id'])) ){
	$module = $app_config['module_default'];
}

if( file_exists(DIR_PUBLIC.'modules/'.$module.'/ControllerCustom.php') ){
	include_once(DIR_PUBLIC.'modules/'.$module.'/ControllerCustom.php');
	$moduleController = $module.'ControllerCustom';
}
elseif( file_exists(DIR_PUBLIC.'modules/'.$module.'/Controller.php') ){
	include_once(DIR_PUBLIC.'modules/'.$module.'/Controller.php');
	$moduleController = $module.'Controller';
}
else{
	die('Module '.$module.' not found');
}



//Controller
$moduleController = ucfirst($moduleController);
if( class_exists($moduleController) ){		
	$bean = new $moduleController();
}
else{
	die('Controller for module '. $module .' not exist');
}



//Wiew
$action = ( empty($action) ) ? 'index' : $action;
$action = helperUrl_dasheToCamel($action);

if( method_exists($bean, $action) ){
	$bean->$action();
}
else{
	if( $module=='auth' ){//session time closed
		$bean->index();
	}
	else{
		die('Action '.$action.' for module '. $module.' not exist');
	}
}


$executionTimeEnd = hrtime(true);
$executionTime = ($executionTimeEnd - $executionTimeStart)/1e+9;
echo "\n\n<!-- ";
echo "\n\n".'APP version: 0.0.1 - PHP version: '. PHP_VERSION;
echo "\n\n".'Execution time: '.$executionTime.' s - Memory usage: '.round((round(memory_get_usage() / 1024 * 100) / 100), 2).' Kb';
echo "\n\n-->\n\n"; 