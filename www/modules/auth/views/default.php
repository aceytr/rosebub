
<div style="text-align:center">

<form method="post" action="<?php echo helperUrl_link('auth','login'); ?>">
  
    <p><input name="email" type="email" id="email" placeholder="<?= $mod_lang['email']; ?>"></p>

    <p><input name="password" type="password" id="password" placeholder="<?= $mod_lang['password']; ?>"></p> 

  <button type="submit"><?= $mod_lang['login_submit']; ?></button>
</form>
  <?php 
    if( isset($_SESSION['auth_verify']) && $_SESSION['auth_verify'] == 0 )
    {
      echo '<p><b>'.$mod_lang['login_false'].'</b><br>';
      echo '<a href="'.helperUrl_link('auth','password-forgot').'">'.$mod_lang['password_forgot_question'].'</a></p>';
    }
  ?>

</div>