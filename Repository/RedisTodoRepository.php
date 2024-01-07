<?php

namespace Todoist\Repository;

class RedisTodoRepository extends Repository
{

	public function getList(array $filter): array
	{
		return [];
	}

	public function add($entity): bool
	{
		return  true;
	}

	public function update($entity): bool
	{
		return  true;
	}
}