<?php

include_once('View.php');
include_once('Model.php');

require_once(__DIR__ . '/libraries/vendor/autoload.php');
use Firebase\JWT\JWT;

class AuthController extends RoseBub\Controller{	
	
	private $dataView;
	private $jwtSecretKey = 'Ap*47_tq89*er22';
	
	function __construct()
	{
		parent::__construct();
		$this->dataView = array();
	}
	
	/**
	 * function action loggin form
	 *
	 * @return void
	 */
	public function index()
	{
		if(!empty($_SESSION['user_email'])){
			helperUrl_redirect('home','index');
		}
		else{
			$view = new AuthView();
			$view->index($this->dataView);	
		}
	}




	public function passwordForgot()
	{

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
			$authModel = new AuthModel();		
			$contact = $authModel->getContactByEmail(strip_tags($_POST['email']));
			if($contact['id']!=false){//send email
				//JWT
				$iat = time();
				//$exp = $iat + (2 * 60 * 60);//+2 hour
				$exp = $iat + ( 60);//+1 minute
				$key = $this->jwtSecretKey;
				$payload = array(
					"sub" => "password-new",
					"id" => $contact['id'],
					"email" => $contact['email'],
					"iat" => $iat,
					"exp" => $exp
				);
				$jwt = JWT::encode($payload, $key);
				
				$this->dataView['link'] = appHelperUrl_link('auth','passwordNew','','jwt='.$jwt);							

				$view = new AuthView();
				$subject = $view->passwordForgotEmailSubject($this->dataView);	
				$body = $view->passwordForgotEmailHtml($this->dataView);				
				$altBody = $view->passwordForgotEmailTxt($this->dataView);

				require_once(DIR_APP.'/helpers/appHelperEmail.php');	
				$resultMail = helperEmail_send($userMail=$_POST['email'],$userName='',$subject,$body,$altBody);
				$this->dataView['resultMail'] = $resultMail;
				if($resultMail!=true){
					$this->dataView['resultMail'] = $resultMail;
				}
			}
		}
		
		$view = new AuthView();
		$view->passwordForgot($this->dataView);

	}



	public function passwordNew()
	{
		$this->dataView['newPassword'] = '';
		$this->dataView['jwtErrorMsg'] = '';

		$jwtError = $jwtErrorMsg = false;

		try{
			$jwtDecoded = JWT::decode($_GET['jwt'], $this->jwtSecretKey, array('HS256'));
		}
		catch (Exception $e) {
			$jwtError = true;
			$jwtErrorMsg = "Error : ".$e->getMessage();
		}

		if($jwtError === false){
			//echo "<h1>JWT Decode</h1>";
			//echo "<p>".print_r($jwtDecoded)."</p>";

			$newPassord = $this->generatePassword($length = 12, $add_dashes = false, $available_sets = 'luds');
						
			$authModel = new AuthModel();		
			$authModel->setNewPassword($jwtDecoded->id, password_hash($newPassord, PASSWORD_DEFAULT));
			
			$this->dataView['newPassword'] = $newPassord;
		}
		else{
			$this->dataView['jwtErrorMsg'] = $jwtErrorMsg;
		}

		$view = new AuthView();
		$view->passwordNew($this->dataView);
	}




	/**
	 * function authenficate
	 *
	 * @return void
	 */
	public function login()
	{	
	
		$email = $this->cleanInputString($_POST['email']);
		$password = $this->cleanInputString($_POST['password']);

		$authModel = new AuthModel();		
		$row = $authModel->getContactByEmail($email);

		if($row!==false){
			if( password_verify($password, $row['password']) ){

				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_first_name'] = $row['first_name'];
				$_SESSION['user_last_name'] = $row['last_name'];
				$_SESSION['user_email'] = $row['email'];			
				$_SESSION['user_phone_mobile'] = $row['phone_mobile'];
				$_SESSION['user_address_street'] = $row['address_street'];
				$_SESSION['user_address_postalcode'] = $row['address_postalcode'];
				$_SESSION['user_address_city'] = $row['address_city'];
				$_SESSION['user_address_country'] = $row['address_country'];
				$_SESSION['user_birthdate'] = $row['birthdate'];
				$_SESSION['user_lang'] = $row['lang'];
				$_SESSION['user_roles'] = $row['roles'];
				$_SESSION['user_groups'] = $row['groups'];

				$_SESSION['auth_verify'] = 1;
				helperUrl_redirect('home','index','','',$row['lang']);
				return;
			}
		}
		
		$_SESSION['auth_verify'] = 0;
		helperUrl_redirect('auth','index'); 
		return;
	}



	/**
	 * function logout, session destroy
	 *
	 * @return void
	 */
	public function logout()
	{
		session_destroy();
		helperUrl_redirect('home','index');
	}


	/**
	 * function security clean input var
	 *
	 * @param string $var
	 * @return string
	 */
	private function cleanInputString($var)
	{
		return( strip_tags($var) ) ;
	}



	/**
	 * generate stron password
	 *
	 * @param integer $length
	 * @param boolean $add_dashes
	 * @param string $available_sets
	 * @return string password
	 */
	private function generatePassword($length = 10, $add_dashes = false, $available_sets = 'luds')
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

}