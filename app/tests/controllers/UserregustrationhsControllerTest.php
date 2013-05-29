<?php

class UserregustrationhsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userregustrationhs');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userregustrationhs/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userregustrationhs/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userregustrationhs/1/edit');
		$this->assertTrue($response->isOk());
	}
}
