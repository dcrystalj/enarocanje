<?php

class UserregistrationsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userregistrations');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userregistrations/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userregistrations/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userregistrations/1/edit');
		$this->assertTrue($response->isOk());
	}
}
