<?php

function truncate(string $text, ?int $maxLength = null): string
{
	if ($maxLength === null)
	{
		return $text;
	}

	$cropped = mb_substr($text, 0, $maxLength, 'UTF-8');

	if ($cropped !== $text)
	{
		return "$cropped...";
	}

	return $text;
}

function createTodo(string $title) : array
{
	return [
		'id' => uniqid('', false),
		'title' => $title,
		'completed' => false,
		'created_at' => time(),
		'updated_at' => null,
		'completed_at' => null,
	];
}

function mapTodos(array $todos,array $positions,Closure $callback) : array
{
	foreach ($positions as $position)
	{
		$index = (int)$position - 1;

		if (!isset($todos[$index]))
		{
			continue;
		}

		$result=$callback($todos[$index]);

		if(is_array($result))
		{
			$todos[$index] =$result;
		}
		else
		{
			unset($todos[$index]);
		}
	}

	return array_values($todos);
}