<?php

function doneCommand(array $arguments)
{
	$todos = getTodosorFail($time);

	$now = time();

	$todos = mapTodos($todos,$arguments,function($todo) use ($now) {
		return array_merge($todo, [
			'completed' => true,
			'updated_at' => $now,
			'completed_at' => $now,
		]);
	});

	storeTodos($todos);
}