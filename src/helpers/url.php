<?php


if (! function_exists('helperUrl_link'))
{
	/**
	 * for make url with rewrinting or not
	 * look param url_rewriting ni var app_config
	 * config.php or custom/config.php
	 *
	 * @param string $module
	 * @param string $action
	 * @param string $id
	 * @param string $other exemple: param1=toto&param2=titi...
	 * @return string $uri form with po without url friendly
	 */
	function helperUrl_link($module,$action,$id='',$other='',$lang=''){

		global $app_config;
		if(empty($lang)){
			global $lang;
		}
		

		$module = strtolower($module);
		$action = strtolower($action);

		/*if(!empty($_SESSION['user_lang'])){
			$lang = $_SESSION['user_lang'];
		}*/

		if($app_config['url_rewriting']==1){
			$uri = DIR_WEB.''.$lang;
			$uri .= '/'.$module;
			$uri .= '/'.$action;
			if(!empty($id)){ $uri .= '/'.$id; }
			if(!empty($other)){ $uri .= '?'.$other; }
		}
		else{
			$uri = DIR_WEB.'index.php?q='.$lang;
			$uri .= '/'.$module;
			$uri .= '/'.$action;
			if(!empty($id)){ $uri .= '/'.$id; }
			if(!empty($other)){ $uri .= '&'.$other; }
		}

		return $uri;
	}
}


if (! function_exists('helperUrl_dasheToCamel'))
{
	/**
	 * input string 'this-is-a-string' 
	 * output string 'thisIsAString'
	 *
	 * @param string $string
	 * @return string
	 */
	function helperUrl_dasheToCamel($string){

		return lcfirst(str_replace('-', '', ucwords($string, "-")));

	}
}


if (! function_exists('helperUrl_redirect'))
	{
	/**
	 * uri redirection
	 *
	 * @param string $module
	 * @param string $action
	 * @param string $id
	 * @param string $other
	 * @return void url redirection
	 */
	function helperUrl_redirect($module,$action,$id='',$other='',$lang=''){

		header('Location: '.helperUrl_link($module,$action,$id,$other,$lang));

	}
}
