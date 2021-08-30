<?php

    require_once(DIR_APP.'/helpers/i18n.php');
    $countries = helperI18n_getCountries();
    $emoji_flags = helperI18n_getEmojisForCountries();

    echo '<form method="post" id="myprofil-update" action="'.helperUrl_link('myprofil','update-save').'">';
?>


<div style="text-align:center;">
    <h1><?= $mod_lang['title']; ?></h1>


    <?php

    echo '<p><b>'.$mod_lang['first_name'].':</b> <input type="text" name="first_name" value="'.$dataView['first_name'].'"></p>';
    echo '<p><b>'.$mod_lang['last_name'].':</b> <input type="text" name="last_name" value="'.$dataView['last_name'].'"></p>';
    echo '<p><b>'.$mod_lang['email'].':</b> <input type="text" name="email" value="'.$dataView['email'].'"></p>';
    echo '<p><b>'.$mod_lang['phone_mobile'].':</b> <input type="text" name="phone_mobile" value="'.$dataView['phone_mobile'].'"> (+xxxxxxxxxx)</p>';
    echo '<p><b>'.$mod_lang['address_street'].':</b> <input type="text" name="address_street" value="'.$dataView['address_street'].'"></p>';
    echo '<p><b>'.$mod_lang['address_postalcode'].':</b> <input type="text" name="address_postalcode" value="'.$dataView['address_postalcode'].'"></p>';
    echo '<p><b>'.$mod_lang['address_city'].':</b> <input type="text" name="address_city" value="'.$dataView['address_city'].'"></p>';
    
    echo '<p><b>'.$mod_lang['address_country'].':</b> <select name="address_country">';
	echo '<option></option>';
    foreach($countries as $key=>$val){
        $country = strtoupper($val);
        echo '<option value="'.$country.'" ';
        if($country==$dataView['address_country']){
            echo 'selected';
        }
        echo '>'.$country.'</span></option>';
    }  
    echo '</select></p>'; 
    
    echo '<p><b>'.$mod_lang['birthdate'].':</b> <input type="text" name="birthdate" value="'.$dataView['birthdate'].'"> (yyyy-mm-dd)</p>';
    echo '<p><b>'.$mod_lang['lang'].':</b> <select name="lang">';


        $langArr = array('us','gb','fr','es','de','it','pt','pl');

        foreach($langArr as $langSelect){
            echo '<option value="'.$langSelect.'" ';
            if($langSelect==$dataView['lang']){
                echo 'selected';
            }
            echo '>'.$emoji_flags[strtoupper($langSelect)].' '.$countries[strtoupper($langSelect)].'</span></option>';
        } 

    
    echo '</select></p>';

    ?>
<span class="flag-icon flag-icon-gr"></span>
    


    <?php 
        echo '<h3><a href="javascript:void(0);document.getElementById(\'myprofil-update\').submit();">'.$mod_lang['profil_update'].'</a></h3>';

    echo '</form>';
?>

</div>
