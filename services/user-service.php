<?php

function getUserByLogin(string $login): ?array
{
	$userList = getUserList();
	$userIndex = array_search($login, array_column($userList, 'login'), true);
	if ($userIndex === false)
	{
		return null;
	}

	return $userList[$userIndex];
}

 //echo password_hash("123",PASSWORD_DEFAULT);
function getUserList(): array
{
	return [
		[
			'id'=>1,
			'login'=>'Yan',
			'password'=>password_hash('123',PASSWORD_DEFAULT),
		],
		[
			'id'=>2,
			'login'=>'Denis',
			'password'=>'222',
		]
	];
}