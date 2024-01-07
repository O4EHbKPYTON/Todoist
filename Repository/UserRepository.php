<?php

namespace Todoist\Repository;


class UserRepository extends Repository
{

	/**
	 * @param array $filter
	 * @return User[]
	 */

	function getList(array $filter = []): array// $time if exists then int if not null
	{
		return [];
	}

	function getListorFail(array  $filter): array
	{
		$items = $this->getList($filter);

		if (empty($items))
		{
			echo 'Nothing to do here' . PHP_EOL;
			exit();
		}

		return $items;
	}

	public function add($user): bool
	{
		return true;

	}

	public function update($user): bool
	{
		return true;

	}
}