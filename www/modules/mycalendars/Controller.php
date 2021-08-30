<?php

include_once('View.php');
include_once('Model.php');

class MyCalendarsController extends RoseBub\Controller{

	private $data;
	
	function __construct()
	{	
		parent::__construct();
		$this->dataView = array();	
		
		if(empty($_SESSION['user_id'])){//must be connected
			helperUrl_redirect('auth','index'); 
		}
	}


	
	public function index()
	{
		$view = new MyCalendarsView();
		$view->index($this->dataView);
	}

	
}