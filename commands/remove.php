<?php

function removeCommand(array $arguments)
{
	$todos = getTodosorFail();

	$now = time();

	// foreach ($arguments as $num)
	// {
	// 	$index = (int)$num - 1;
	//
	// 	if (!isset($todos[$index]))
	// 	{
	// 		continue;
	// 	}
	//
	// 	unset($todos[$index]);
	// }
	//
	// $todos = array_values($todos);

	$todos=mapTodos($todos,$arguments,fn($todo) => null);
	// {
	// 	return null;
	// });

	storeTodos($todos);
}