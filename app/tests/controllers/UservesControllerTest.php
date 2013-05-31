<?php

class UservesControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userves');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userves/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userves/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userves/1/edit');
		$this->assertTrue($response->isOk());
	}
}
