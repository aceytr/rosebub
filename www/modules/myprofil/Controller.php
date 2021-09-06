<?php

use App\Controller;

include_once('View.php');
include_once('Model.php');

class MyProfilController extends Controller{

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
		$profilModel = new MyProfilModel();		
		$result = $profilModel->getContactConnected($_SESSION['user_id']);
		
		if($result!==false){
			foreach($result as $key=>$val){
				$this->dataView[$key] = $val;
			}

			
			if( !empty($this->dataView['birthdate']) ){	
				$this->dataView['birthdate'] = $this->dateChangeFormat($this->dataView['birthdate'],
																		'Y-m-d',
																		$this->dataView['dateformat']);
			}
			
			$view = new MyProfilView();
			$view->index($this->dataView);
		}		
	}

	public function update()
	{
		$profilModel = new MyProfilModel();		
		$result = $profilModel->getContactConnected();
		
		if($result!==false){
			foreach($result as $key=>$val){
				$this->dataView[$key] = $val;
			}

			if( !empty($this->dataView['birthdate']) ){	
				$birthdate = explode('-',$this->dataView['birthdate']);
				$this->dataView['birthdate_year'] = $birthdate[0];
				$this->dataView['birthdate_month'] = $birthdate[1];
				$this->dataView['birthdate_day'] = $birthdate[2];
			}

			$view = new MyProfilView();
			$view->update($this->dataView);
		}		
	}

	
	public function updateSave()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			$profilModel = new MyProfilModel();

			$dataModel = array();
			$dataModel['first_name'] = strip_tags($_POST['first_name']);
			$dataModel['last_name'] = strip_tags($_POST['last_name']);
			$dataModel['email'] = strip_tags($_POST['email']);
			$dataModel['dialing_code'] = strip_tags($_POST['dialing_code']);
			$dataModel['phone_mobile'] = strip_tags($_POST['phone_mobile']);
			$dataModel['address_street'] = strip_tags($_POST['address_street']);
			$dataModel['address_postalcode'] = strip_tags($_POST['address_postalcode']);
			$dataModel['address_city'] = strip_tags($_POST['address_city']);
			$dataModel['address_country'] = strip_tags($_POST['address_country']);
			$dataModel['country_code'] = strip_tags($_POST['country_code']);
			$dataModel['birthdate'] = strip_tags($_POST['birthdate_year']).'-'.strip_tags($_POST['birthdate_month']).'-'.strip_tags($_POST['birthdate_day']);
			$dataModel['lang'] = strip_tags($_POST['lang']);
			if($dataModel['lang']=='gb' || $dataModel['lang']=='gb'){
				$dataModel['lang']=='en';
			}
			$dataModel['dateformat'] = strip_tags($_POST['dateformat']);
			$dataModel['timezone'] = strip_tags($_POST['timezone']);
			$dataModel['calendars'] = strip_tags($_POST['calendars']);


			$profilModel->setContactConnected($dataModel);


			$_SESSION['user_first_name'] = $dataModel['first_name'];
			$_SESSION['user_last_name'] = $dataModel['last_name'];
			$_SESSION['user_email'] = $dataModel['email'];
			$_SESSION['user_dialing_code'] = $dataModel['dialing_code'];			
			$_SESSION['user_phone_mobile'] = $dataModel['phone_mobile'];
			$_SESSION['user_address_street'] = $dataModel['address_street'];
			$_SESSION['user_address_postalcode'] = $dataModel['address_postalcode'];
			$_SESSION['user_address_city'] = $dataModel['address_city'];
			$_SESSION['user_address_country'] = $dataModel['address_country'];
			$_SESSION['user_country_code'] = $dataModel['country_code'];
			$_SESSION['user_birthdate'] = $dataModel['birthdate'];
			$_SESSION['user_lang'] = $dataModel['lang'];
			$_SESSION['dateformat'] = $dataModel['dateformat'];
			$_SESSION['timezone'] = $dataModel['timezone'];
			$_SESSION['calendars'] = $dataModel['calendars'];

		}

		helperUrl_redirect('myprofil','index','','save=1',$_SESSION['user_lang']);
	}

}