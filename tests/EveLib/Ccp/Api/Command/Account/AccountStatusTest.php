<?php

require_once 'EveLib/Ccp/Api/Command/Account/AccountStatus.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * @group EveLib_Ccp_Api_Command_Corp
 * EveLib_Ccp_Api_Command_Account_AccountStatus test case.
 */
class EveLib_Ccp_Api_Command_Account_AccountStatusTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Account_AccountStatus
	 */
	private $EveLib_Ccp_Api_Command_Account_AccountStatus;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_AccountStatusTest::setUp()
		
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_AccountStatusTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Account_AccountStatus = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_AccountStatus->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_AccountStatusTest->test_parseResponse()
//		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		

		$this->EveLib_Ccp_Api_Command_Account_AccountStatus = 
			$this->getMock('EveLib_Ccp_Api_Command_Account_AccountStatus')
				->method('_parseResponse')
				->will($this->returnValue(array()));
		$this->EveLib_Ccp_Api_Command_Account_AccountStatus->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_AccountStatus->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_AccountStatusTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Account_AccountStatus->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_AccountStatus->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_AccountStatusTest->testSet_cache_key()
//		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Account_AccountStatus = 
			$this->getMock('EveLib_Ccp_Api_Command_Account_AccountStatus')
				->method('set_cache_key')
				->will($this->returnValue(array()));
		$this->EveLib_Ccp_Api_Command_Account_AccountStatus->set_cache_key(/* parameters */);
	
	}

}

