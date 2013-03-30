<?php

class UserregustrationvsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'userregustrationvs');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'userregustrationvs/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'userregustrationvs/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'userregustrationvs/1/edit');
		$this->assertTrue($response->isOk());
	}
}
