<?php
require_once('../views/head.php');
require_once('inc/header.php');
?>
<form action="admin.php?action=login" method="post" id="loginform">
	<input type="hidden" name="login" value="true">
	<?php
		if( isset($results['errorMessage']) ) { ?>
			<div class="error"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>
	<fieldset class="row clearfix">
		<label for="username" class="col half">Username</label>
		<input class="col half" type="text" name="username" id="username" placeholder="Your username" required autofocus>
	</fieldset>
	<fieldset class="row clearfix">
		<label for="password" class="col half">Password</label>
		<input class="col half" type="text" name="password" id="password" placeholder="Your password" required>
	</fieldset>
	<div id="login-button" class="row clearfix">
		<input class="col third" type="submit" name="login" value="Login">
	</div>
</form>
<?
require_once('inc/footer.php');
?>