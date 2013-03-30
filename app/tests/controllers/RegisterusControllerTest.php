<?php

class RegisterusControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'registerus');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'registerus/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'registerus/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'registerus/1/edit');
		$this->assertTrue($response->isOk());
	}
}
