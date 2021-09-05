<?php

use App\View;

include_once(__DIR__.'/languages/'.$lang.'.php');

class AuthView extends App\View
{
	
	function __construct()
    {				

	}
	
	public function index(array $dataView)
    {        
        global $mod_lang;
        
        $dataView['head_title'] = $mod_lang['title'];
        
        parent::setView(DIR_PUBLIC.'layouts/head.php');
		parent::setView(DIR_PUBLIC.'layouts/menu.php');
        parent::setView(DIR_PUBLIC.'modules/auth/views/default.php');       
        parent::setView(DIR_PUBLIC.'layouts/footer.php');
        echo parent::render($dataView);
	}


    public function passwordForgot(array $dataView)
    {
        global $mod_lang;
        
        $dataView['head_title'] = $mod_lang['password_forgot_question'];
        
        parent::setView(DIR_PUBLIC.'layouts/head.php');
		parent::setView(DIR_PUBLIC.'layouts/menu.php');
        parent::setView(DIR_PUBLIC.'modules/auth/views/passwordForgot.php');
        parent::setView(DIR_PUBLIC.'layouts/footer.php');
        echo parent::render($dataView);
    }


    public function passwordNew(array $dataView)
    {
        global $mod_lang;
        
        $dataView['head_title'] = $mod_lang['password_new'];
        
        parent::setView(DIR_PUBLIC.'layouts/head.php');
		parent::setView(DIR_PUBLIC.'layouts/menu.php');
        parent::setView(DIR_PUBLIC.'modules/auth/views/passwordNew.php');
        parent::setView(DIR_PUBLIC.'layouts/footer.php');
        echo parent::render($dataView);
    }

    public function passwordForgotEmailHtml(array $dataView)
    {
        parent::setView(DIR_PUBLIC.'modules/auth/views/passwordForgotEmailHtml.php');
        return parent::render($dataView);
    }

	public function passwordForgotEmailTxt(array $dataView)
    {    
        parent::setView(DIR_PUBLIC.'modules/auth/views/passwordForgotEmailTxt.php');
        return parent::render($dataView);
    }

	public function passwordForgotEmailSubject(array $dataView)
    {
        parent::setView(DIR_PUBLIC.'modules/auth/views/passwordForgotEmailSubject.php');
        return parent::render($dataView);
    }

}