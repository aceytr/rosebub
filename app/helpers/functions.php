<?php

/**
 * for make url with rewrinting or not
 * look param url_rewriting ni var app_config
 * config.php or custom/config.php
 *
 * @param string $module
 * @param string $action
 * @param string $id
 * @param string $other
 * @return string 
 */
function appMakeUrl($module,$action,$id='',$other=''){

	global $app_config;

	if($app_config['url_rewriting']==1){
		$url = WEB_ROOT.''.$module;
		$url .= '/'.$action;
		if(!empty($id)){ $url .= '/'.$id; }
		if(!empty($other)){ $url .= '?'.$other; }
	}
	else{
		$url = WEB_ROOT.'index.php?module='.$module;
		$url .= '&action='.$action;
		if(!empty($id)){ $url .= '&id='.$id; }
		if(!empty($other)){ $url .= '&'.$other; }
	}
	return $url;
}




function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}

function cleanInputString($var){
	return( htmlspecialchars(strip_tags($var)) ) ;
}


//############################## OLD  CHECK IT bEFORE utils PLEASE 


function dateconvert($string,$normein,$normeout){
	if($normein=="us" & $normeout=="fr"){
		$string = preg_replace("#([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})#", "$3/$2/$1", $string);
	}

	if($normein=="fr" & $normeout=="us"){
		$string = preg_replace("#([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})#", "$3-$2-$1", $string);
	}
	   
	return($string);
}

function datetimeconvert($string,$normein,$normeout){
	if ($normein=="us" & $normeout=="fr"){
		$string = preg_replace("#([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})#", "$3/$2/$1 $4:$5:$6", $string);
	}
	if ($normein=="fr" & $normeout=="us"){
		$string = preg_replace("#([0-9]{1,2})/([0-9]{1,2})/([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})#", "$3-$2-$1 $4:$5:$6", $string);
	}
	return($string);
}



function _nomUnix($text){
	$text = str_replace(",","",$text);
	$trans = get_html_translation_table(HTML_ENTITIES); // Place les entités dans un tableau
	foreach ($trans as $literal =>$entity){ // Crée deux tableaux, un pour la forme accentuée, l'autre sans accents
		if (ord($literal)>=192){ // Ne concerne pas les caractères comme les fractions, guillemets, etc...
		$replace[]=substr($entity,1,1); //Récupère le 'E' de la chaîne '&Eaccute' etc.
		$search[]=$literal;
		}
	} //Renvoie la lettre accentuée
	$chaine = str_replace($search, $replace, $text);
	$chaine = strtolower(str_replace(" ","-",$chaine));
	return($chaine);
}




function getRandom($car) {
	//Gerer une chaine de caractere unique et aleatoire
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
		$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}

function _removeAccent($string){
	$string = strtolower(htmlentities($string, ENT_QUOTES, 'UTF-8'));
	$string = preg_replace('#\&(.)(?:uml|circ|tilde|acute|grave|cedil|ring)\;#', '\1', $string);
	$string = preg_replace('#\&(.{2})(?:lig)\;#', '\1', $string); // pour '&oelig;'...
	$string = str_replace("&nbsp;"," ",$string);
	$string = str_replace("+","",$string);
	$string = str_replace("/","",$string);
	$string = preg_replace('#\&[a-z]+\;#', '', $string);
return $string;
}





function modifier_capitalize($string, $uc_digits = false){
	modifier_capitalize_ucfirst(null, $uc_digits);
	return preg_replace_callback('!\b\w+\b!', 'modifier_capitalize_ucfirst', $string);
}

function modifier_capitalize_ucfirst($string, $uc_digits = null) {
	static $_uc_digits = false;

	if(isset($uc_digits)){
		$_uc_digits = $uc_digits;
		return;
	}

	if(!preg_match('!\d!',$string[0]) || $_uc_digits)
		return ucfirst($string[0]);
	else
		return $string[0];
}


function create_guid(){
	$microTime = microtime();
	list($a_dec, $a_sec) = explode(" ", $microTime);
	$dec_hex = dechex($a_dec* 1000000);
	$sec_hex = dechex($a_sec);
	ensure_length($dec_hex, 5);
	ensure_length($sec_hex, 6);
	$guid = "";
	$guid .= $dec_hex;
	$guid .= create_guid_section(3);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= create_guid_section(4);
	$guid .= '-';
	$guid .= $sec_hex;
	$guid .= create_guid_section(6);
	return $guid;
}//End function create_guid


function create_guid_section($characters){
	$return = "";
	for($i=0; $i<$characters; $i++){
		$return .= dechex(mt_rand(0,15));
	}
	return $return;
}//End function create_guid_section



function ensure_length(&$string, $length){
	$strlen = strlen($string);
	if($strlen < $length){
		$string = str_pad($string,$length,"0");
	}
	else if($strlen > $length){
		$string = substr($string, 0, $length);
	}
}//End function ensure_length

