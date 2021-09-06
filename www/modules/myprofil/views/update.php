<?php

    require_once(DIR_APP.'/helpers/i18n.php');
    $countries = helperI18n_getCountries();
    $emoji_flags = helperI18n_getEmojisForCountries();
    $timezones = helperI18n_getTimezones();

    echo '<form method="post" id="myprofil-update" action="'.helperUrl_link('myprofil','update-save').'">';
?>

<script language = "javascript" type = "text/javascript" src="<?= DIR_WEB;  ?>modules/myprofil/assets/js/dialingcodebycountryiso2.js"></script>

<script language = "javascript" type = "text/javascript">
  function setDialingCodeAndCountryCode(countryIso2,countryName){
        var prefixCountryjson = getDialingCode();
        const prefixCountry = JSON.parse(prefixCountryjson);

        document.getElementById('address_country').value = countryName;
        document.getElementById('dialing_code').value = '+'+prefixCountry[countryIso2];

  }
</script>

<div style="text-align:center;">
    <h1><?= $mod_lang['title']; ?></h1>


    <?php

    echo '<p><b>'.$mod_lang['first_name'].':</b> <input type="text" name="first_name" value="'.$dataView['first_name'].'"></p>';
    echo '<p><b>'.$mod_lang['last_name'].':</b> <input type="text" name="last_name" value="'.$dataView['last_name'].'"></p>';
   
   
    
    echo '<p><b>'.$mod_lang['address_street'].':</b> <input type="text" name="address_street" value="'.$dataView['address_street'].'"></p>';
    echo '<p><b>'.$mod_lang['address_postalcode'].':</b> <input type="text" name="address_postalcode" value="'.$dataView['address_postalcode'].'"></p>';
    echo '<p><b>'.$mod_lang['address_city'].':</b> <input type="text" name="address_city" value="'.$dataView['address_city'].'"></p>';
    
    echo '<p><b>'.$mod_lang['address_country'].':</b> <select name="country_code" 
        onchange="setDialingCodeAndCountryCode(this.options[this.selectedIndex].value,this.options[this.selectedIndex].text)">';
	echo '<option></option>';
    foreach($countries as $key=>$val){
        $country = strtoupper($val);
        echo '<option value="'.$key.'" ';
        if($key==$dataView['country_code']){
            echo 'selected';
        }
        echo '>'.$country.'</span></option>';
    }  
    echo '</select></p>'; 


    echo '<input type="hidden" name="address_country" id="address_country" value="'.$dataView['address_country'].'">';
    
    
    echo '<p><b>'.$mod_lang['email'].':</b> <input type="text" name="email" value="'.$dataView['email'].'"></p>';
    
    echo '<p><b>'.$mod_lang['phone_mobile'].':</b> ';
    echo '<input size="4" type="text" name="dialing_code" id="dialing_code" value="'.$dataView['dialing_code'].'" readonly>';
    echo '<input size="8" type="text" name="phone_mobile" value="'.$dataView['phone_mobile'].'">';
    echo '</p>';


    echo '<p><b>'.$mod_lang['birthdate'].':</b> ';
    
    echo '<select name="birthdate_year">';
    $i = date('Y');
    while($i >= date('Y')-100){
        echo '<option value="'.$i.'"';
        if($dataView['birthdate_year']==$i){ echo ' selected '; }
        echo '>'.$i.'</option>';
        $i--;
    }
    echo '</select>';

    echo '<select name="birthdate_month">';
    $i = 0;
    while($i <= 12){
        echo '<option value="'.$i.'"';
        if($dataView['birthdate_month']==$i){ echo ' selected '; }
        echo '>'.$i.'</option>';
        $i++;
    }
    echo '</select>';

    echo '<select name="birthdate_day">';
    $i = 0;
    while($i <= 31){
        echo '<option value="'.$i.'"';
        if($dataView['birthdate_day']==$i){ echo ' selected '; }
        echo '>'.$i.'</option>';
        $i++;
    }
    echo '</select>';

    echo '</p>';
    
    
    echo '<p><b>'.$mod_lang['lang'].':</b> <select name="lang">';


        $langArr = array('us','gb','fr','es','de','it','pt','pl','cn','jp','kr');

        foreach($langArr as $langSelect){
            echo '<option value="'.$langSelect.'" ';
            if($langSelect==$dataView['lang']){
                echo 'selected';
            }
            echo '>'.$emoji_flags[strtoupper($langSelect)].' '.$countries[strtoupper($langSelect)].'</span></option>';
        } 

    
    echo '</select></p>';

    echo '<p><b>'.$mod_lang['dateformat'].':</b> <select name="dateformat">';
        echo '<option value="Y-m-d"';
        if( $dataView['dateformat'] == "Y-m-d" ){
            echo 'selected';
        }
        echo '>'.date("Y-m-d").'</option>';
        echo '<option value="d/m/Y"';
        if( $dataView['dateformat'] == "d/m/Y" ){
            echo 'selected';
        }
        echo '>'.date("d/m/Y").'</option>';
    echo '</select></p>';


    echo '<p><b>'.$mod_lang['timezone'].':</b> <select name="timezone">';

	echo '<option></option>';
    foreach($timezones as $key=>$val){
        //$timezone = strtoupper($val);
        echo '<option value="'.$key.'" ';
        if($key==$dataView['timezone']){
            echo 'selected';
        }
        echo '>'.$val.'</span></option>';
    }  
    echo '</select></p>'; 


    echo '<input type="hidden" name="calendars" value="">';

    ?>

    


    <?php 
        echo '<h3><a href="javascript:void(0);document.getElementById(\'myprofil-update\').submit();">'.$mod_lang['profil_update'].'</a></h3>';

    echo '</form>';
?>

</div>
