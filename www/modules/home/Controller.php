<?php

include_once('View.php');
include_once('Model.php');

class HomeController extends App\Controller{

	private $data;
	
	function __construct()
	{	
		parent::__construct();
		$this->dataView = array();
		
		global $app_config;
		if(empty($_SESSION['user_id']) && $app_config['module_default']=='auth'){//must be connected
			appHelperUrl_redirect('auth','index'); 
		}
	}


	
	public function index()
	{
		$view = new HomeView();
		$view->index($this->dataView);
	}

	
}