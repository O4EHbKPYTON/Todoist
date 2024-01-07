<?php

require_once __DIR__ . '/../boot.php';

$errors=[];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	//TODO : check fields
	$login=$_POST['login'];
	$password=$_POST['password'];

	$error ='Invalid username or password';
	//Identification
	$user= getUserByLogin($login);

	if(!$user)
	{
		$errors[]=$error;
	}
	else
	{
		//Authentication
		$isPasswordCorrect=password_verify($password,$user['password']);

		if (!$isPasswordCorrect)
		{
			$errors[]=$error;
		}

		if(empty($errors))
		{
			session_start();
			$_SESSION['USER']=$user;
			redirect('index.php');
			exit();
		}
	}
}

echo view('layout',[
	'title'=>'Todoist::Log in',
	'bottomMenu'=>0,
	'content'=>view('pages/login',[
		'errors'=>$errors,
	])
]);