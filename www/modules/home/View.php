<?php

include_once(__DIR__.'/languages/'.$lang.'.php');

class HomeView extends App\View
{

    function __construct()
    {  

    }

    public function index(array $dataView)
    {
        global $mod_lang;

        $dataView['head_title'] = $mod_lang['title'];

        parent::setView(ROOT.'layouts/head.php'); 
		parent::setView(ROOT.'layouts/menu.php');          
        parent::setView(__DIR__.'/views/default.php');
        parent::setView(ROOT.'layouts/footer.php');
        echo parent::render($dataView);
    }


}
