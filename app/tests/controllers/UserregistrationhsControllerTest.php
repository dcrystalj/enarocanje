<?php

class UserregistrationhsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userregistrationhs');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userregistrationhs/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userregistrationhs/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userregistrationhs/1/edit');
		$this->assertTrue($response->isOk());
	}
}
