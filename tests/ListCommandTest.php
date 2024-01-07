<?php

use PHPUnit\Framework\TestCase;

class ListCommandTest extends TestCase
{
	public function testInvalidDate()
	{
		$command = new ListCommand(['invaliddate']);
		$command->execute();
		$this->assertEquals(1, $command->getStatusCode());
		// $this->assertStringContainsString("Invalid date", $command->getOutput());
	}

	public function testEmptyList()
	{
		$command = new ListCommand(['3023-01-01 12:00:00']);
		$command->execute();

		$this->assertEquals(0,$command->getStatusCode());
		$this->assertEmpty($command->getOutput());
	}
}