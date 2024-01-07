<?php

function addCommand(array $arguments)
{
	$title = array_shift($arguments);

	$repo= new \Todoist\Repository\TodoRepository();

	$todo = new Todo($title);

	$repo->add($todo);

	//var_dump($todo);

}