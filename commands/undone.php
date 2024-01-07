<?php

function undoneCommand(array $arguments)
{
	$time = null;

	if (!empty($arguments))
	{
		$date = array_shift($arguments);
		$time = strtotime($date);
		if ($time === false)
		{
			echo "Invalid date \n";
			exit(1);
		}
	}
	$todos = getTodosorFail($time);

	// foreach ($arguments as $num)
	// {
	// 	$index = (int)$num - 1;
	//
	// 	if (!isset($todos[$index]))
	// 	{
	// 		continue;
	// 	}
	//
	// 	$todos[$index] = array_merge($todos[$index], [
	// 		'completed' => false,
	// 		'updated_at' => time(),
	// 		'completed_at' => null,
	// 	]);
	// }

	$todos=mapTodos($todos,$arguments,function($todo){
		return array_merge($todo, [
			'completed' => false,
	 		'updated_at' => time(),
	 		'completed_at' => null,
	 	]);
	});

	storeTodos($todos);
}