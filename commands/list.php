<?php

class ListCommand
{
	private array $arguments;

	private int $statusCode=0;
	private string $output='';

	public function __construct(array $arguments)
	{
		$this->arguments=$arguments;
	}
	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	public function getOutput(): string
	{
		return $this->output;
	}
	public function execute()
	{
		$time = null;

		if (!empty($this->arguments))
		{
			$date=array_shift($this->arguments);
			$time=strtotime($date);
			if ($time === false)
			{
				$this->ouput .= "Invalid date \n";
				$this->statusCode=1;
				return;
			}
		}

		$repo= new \Todoist\Repository\TodoRepository();
		$todos=$repo->getList(['time'=>$time]);

		foreach ($todos as $index => $todo)
		{
			$this->output .= sprintf(
				"%s. [%s] %s \n",
				($index + 1),
				$todo->isCompleted() ? 'x' : ' ',
				$todo->getTitle(),
			);
		}
	}
}