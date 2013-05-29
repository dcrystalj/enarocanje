<?php

class UserwithformerregistrationsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userwithformerregistrations');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userwithformerregistrations/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userwithformerregistrations/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userwithformerregistrations/1/edit');
		$this->assertTrue($response->isOk());
	}
}
