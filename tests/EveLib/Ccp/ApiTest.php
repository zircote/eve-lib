<?php

require_once 'EveLib/Ccp/Api.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api test case.
 */
class EveLib_Ccp_ApiTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api
	 */
	private $EveLib_Ccp_Api;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->EveLib_Ccp_Api = null;
		parent::tearDown ();
	}
	
	/**
	 * Tests EveLib_Ccp_Api->__call()
	 */
	public function test__call() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->test__call()
		$this->markTestIncomplete ( "__call test not implemented" );
		$api = new EveLib_Ccp_Api();
		$api->apiKey = 'A80B8A4E53A1426A988DB8ECFAAFBA0512595373EEC5449791100A1B5EFDDFB3';
		$api->userID = '666413';
		
//resources.evelib.default.userID = "666413"
//resources.evelib.default.apiKey = "A80B8A4E53A1426A988DB8ECFAAFBA0512595373EEC5449791100A1B5EFDDFB3"
//resources.evelib.default.characterID = "144739728"
		$api->AccountStatus();
		$result = $api->getLastResponse();
//		->getBody();
//		file_put_contents('accountStatus.xml', $result);
		print_r($result);
	}

}

