<?php

//php todo.php list
//php todo.php list 2023-11-15
//php todo.php list today
//php todo.php add "Wake up"
//php todo.php add "Drink coffee"
//php todo.php done 1 2 [x]
//php todo.php undone 1 2 [ ]
//php todo.php remove 2 (rm)
//php todo.php report


require_once __DIR__ . '/boot.php';
//var_dump($argv);

function main(array  $arguments): void
{

	array_shift($arguments);

	$commmand = array_shift($arguments);

	switch ($commmand)
	{
		case 'list':
			$commmand = new ListCommand($arguments);
			$commmand->execute();
			echo $commmand->getOutput();
			exit($commmand->getStatusCode());
			break;
		case 'add':
			 addCommand($arguments);
			 break;
		case 'done':
			 doneCommand($arguments);
			break;
		case 'undone':
			undoneCommand($arguments);
			break;
		case 'remove':
		case 'rm':
			removeCommand($arguments);
			break;
		case 'report':
			reportCommand($arguments);
			break;

		default:
			echo 'Unknown command';
			exit(1);
	}

	exit(0);
	
}

main($argv);