<?php
/**
 * @var array $errors
 */
?>

<main>
	<?php if(!empty($errors)):?>
		<div class="alert danger">
			<?= implode('<br>',$errors) ?>
		</div>
	<?php endif ?>


	<form action="/login.php" method="post" class="add-todo">
		<input type ="text" name="login"  placeholder = "Login">
		<input type ="text" name="password"  placeholder = "Password">
		<button type = "submit">Sign in</button>
	</form>
</main>