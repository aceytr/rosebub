<p style="text-align:center">
	
	<?php if( empty($_SESSION['user_id']) ): ?>
		<a href="<?= helperUrl_link('auth','index'); ?>"><?= $app_lang['mod_auth_login']; ?></a>
	<?php endif; ?>

	<?php if( !empty($_SESSION['user_id']) ): ?>
		<a href="<?= helperUrl_link('home','index'); ?>"><?= $app_lang['mod_home']; ?></a> - 
		<a href="<?= helperUrl_link('myprofil','index'); ?>"><?= $app_lang['mod_myprofil']; ?></a> - 
		<a href="<?= helperUrl_link('auth','logout'); ?>"><?= $app_lang['mod_auth_signout']; ?></a>
	<?php endif; ?>

</p>