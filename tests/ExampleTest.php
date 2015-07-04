<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testSomethingIsTrue()
	{
		$response = $this->call('GET', '/');
        $this->assertResponseOk($response);
        //$this->assertEquals(200, $response->getStatusCode());
        //$this->assertSessionHasErrors();
	}

}
