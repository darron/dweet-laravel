<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
  
  public function testDweetUrl()
  {
    $crawler = $this->client->request('GET', '/dweet');

    $this->assertTrue($this->client->getResponse()->isOk());
  }
  
  public function testSpecificDweetAndVars()
  {
    $crawler = $this->client->request('GET', '/dweet/for/darron?hi=this&and=that');
    $this->assertTrue($this->client->getResponse()->isOk());
  }

  public function testSecondSpecificDweetAndVars()
  {
    $crawler = $this->client->request('GET', '/dweet/for/darron?him=these&andy=those');
    $this->assertTrue($this->client->getResponse()->isOk());
  }

  public function testSpecificDweet()
  {
    $crawler = $this->client->request('GET', '/dweet/for/darron');
    $this->assertTrue($this->client->getResponse()->isOk());
  }
  
  public function testGetLastDweetForDarron()
  {
    $crawler = $this->client->request('GET', '/get/latest/dweet/for/darron');
    $this->assertTrue($this->client->getResponse()->isOk());
  }
  
  public function testAllDweetsForDarron()
  {
    $crawler = $this->client->request('GET', '/get/dweets/for/darron');
    $this->assertTrue($this->client->getResponse()->isOk());
  }

}