<?php

require_once 'EveLib/Ccp/Api/Command/Account/Characters.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Account_Characters test case.
 */
class EveLib_Ccp_Api_Command_Account_CharactersTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Account_Characters
	 */
	private $EveLib_Ccp_Api_Command_Account_Characters;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_CharactersTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Account_Characters = new EveLib_Ccp_Api_Command_Account_Characters(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_CharactersTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Account_Characters = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_Characters->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_CharactersTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Account_Characters->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_Characters->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_CharactersTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Account_Characters->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Account_Characters->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Account_CharactersTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Account_Characters->set_cache_key(/* parameters */);
	
	}

}
