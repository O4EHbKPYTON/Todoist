<?php
/**
 * @var array $todos
 * @var array $errors
 * @var bool $isHistory
 */
?>

<main>
	<?php if(!empty($errors)):?>
	<div class="alert danger">
		<?= implode('<br>',$errors) ?>
	</div>
	<?php endif ?>

	<?php if (empty($todos)) : ?>
		<p>Nothing to do here</p>
	<?php endif; ?>

	<?php foreach ($todos as $todo):?>
		<?=view('components/todo' , [
			'todo' => $todo,
			'isHistory'=> $isHistory,
			]); ?>
	<?php endforeach;?>

	<?php if(!$isHistory): ?>
	<form action="/" method="post" class="add-todo">
		<input type ="text" name="title" required placeholder = "What to do?">
		<button type = "submit">Save</button>
	</form>
	<?php endif ?>
</main>