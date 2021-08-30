
<div style="text-align:center">

<?php if( !empty($dataView['resultMail']) ): ?>

    <?php if( $dataView['resultMail'] == 1 ): ?>
      <p><?= $mod_lang['password_new_send']; ?></p>
    <?php endif; ?>

    <?php if( $dataView['resultMail'] != 1 ): ?>
      <p><?= $dataView['resultMail']; ?></p>
    <?php endif; ?>

<?php endif; ?>


<?php if( empty($dataView['resultMail']) ): ?>

<form method="post" action="<?= helperUrl_link('auth','password-forgot'); ?>">  
  <input name="email" type="email" id="email" placeholder="Email"> 
  <button type="submit"><?= $mod_lang['password_new']; ?></button>
</form>

<?php endif; ?>

</div>
