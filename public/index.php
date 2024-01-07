<?php

use Todoist\Repository\Repository;
use Todoist\Repository\TodoRepository;

require_once __DIR__ . '/../boot.php';


try
{
	$time = null;
	$isHistory = false;
	$title = option('APP_NAME','Todoist');
	$errors=[];

	session_start();
	if(!isset($_SESSION['USER']))
	{
		redirect('login.php');
	}

	$repository=new TodoRepository();

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$title = trim($_POST['title']);

		if(strlen($title) > 0)
		{
			$todo = new Todo($title);

			$repository->add($todo);

			redirect('/?saved=true');
		}
		else
		{
			$errors[]= 'Task cannot be empty';
		}
	}

	if (isset($_GET['date']))
	{
		$time = strtotime($_GET['date']);
		if ($time === false)
		{
			$time = time();
		}

		$today = date('Y-m-d');
		if ($today !== date('Y-m-d', $time))
		{
			$isHistory = true;
			$title = sprintf('Todoist::%s', date('j M', $time));
		}
}


	echo view('layout', [
		'title' => $title,
		'bottomMenu' => require ROOT . '/menu.php',
		'content' => view('pages/index', [
			'todos' => $repository->getList(['filter' => $time]),
			'isHistory' => $isHistory,
			'error' => $errors,
		]),
	]);
}

catch (Exception $e)
{
	// saveErrorToLog($e);
	ob_clean();
	echo view('layout', [
		'title' => 'Something went wrong',
		'bottomMenu' =>[],
		'content' => 'We know about problem and working on it'
	]);
}