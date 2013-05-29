<?php

class Userf.phpsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userf.phps');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userf.phps/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userf.phps/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userf.phps/1/edit');
		$this->assertTrue($response->isOk());
	}
}
