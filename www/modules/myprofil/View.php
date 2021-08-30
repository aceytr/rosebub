<?php

include_once(__DIR__.'/languages/'.$lang.'.php');

class MyProfilView extends RoseBub\View
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
        parent::setView(__DIR__.'/views/default.php');
        parent::setView(DIR_PUBLIC.'layouts/footer.php');
        echo parent::render($dataView);
    }


    public function update(array $dataView)
    {
        global $mod_lang;

        $dataView['head_title'] = $mod_lang['title'];

        parent::setView(DIR_PUBLIC.'layouts/head.php');
		parent::setView(DIR_PUBLIC.'layouts/menu.php');		
        parent::setView(__DIR__.'/views/update.php');
        parent::setView(DIR_PUBLIC.'layouts/footer.php');
        echo parent::render($dataView);
    }


}
