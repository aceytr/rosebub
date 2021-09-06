<?php
	require_once(DIR_APP.'/helpers/i18n.php');
    $emoji_flags = helperI18n_getEmojisForCountries();
    $timezones = helperI18n_getTimezones();
?>


<div style="text-align:center;">
    <h1><?= $mod_lang['title']; ?></h1>
</div>

<?php
if(@$_REQUEST['save'] == 1){
    echo '
            <div style="text-align:center;">
                <font color="green">'.$mod_lang['save_ok'].'</font>
            </div>
    ';
}
?>

<div style="text-align:center;">    
    <?php   
    echo '<p><b>'.$mod_lang['first_name'].':</b> '.$dataView['first_name'].'</p>';
    echo '<p><b>'.$mod_lang['last_name'].':</b> '.$dataView['last_name'].'</p>';
    echo '<p><b>'.$mod_lang['email'].':</b> '.$dataView['email'].'</p>';
    echo '<p><b>'.$mod_lang['phone_mobile'].':</b> '.$dataView['phone_mobile'].'</p>';
    echo '<p><b>'.$mod_lang['address_street'].':</b> '.$dataView['address_street'].'</p>';
    echo '<p><b>'.$mod_lang['address_postalcode'].':</b> '.$dataView['address_postalcode'].'</p>';
    echo '<p><b>'.$mod_lang['address_city'].':</b> '.$dataView['address_city'].'</p>';
    echo '<p><b>'.$mod_lang['address_country'].':</b> '.strtoupper($dataView['address_country']).'</p>';
    echo '<p><b>'.$mod_lang['birthdate'].':</b> '.$dataView['birthdate'].'</p>';
    echo '<p><b>'.$mod_lang['lang'].':</b> '.$emoji_flags[strtoupper($dataView['lang'])].' '.strtoupper($dataView['lang']).'</p>';
    echo '<p><b>'.$mod_lang['dateformat'].':</b> '.$dataView['dateformat'].'</p>';
    echo '<p><b>'.$mod_lang['timezone'].':</b> '.$timezones[$dataView['timezone']].'</p>';
    ?>
</div>

<div style="text-align:center;">
    <?php 
        echo '<h3><a href="'.helperUrl_link('myprofil','update').'">'.$mod_lang['profil_update'].'</a></h3>';
    ?>
</div>
