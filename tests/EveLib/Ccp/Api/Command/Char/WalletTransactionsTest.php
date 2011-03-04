<?php

require_once 'library\EveLib\Ccp\Api\Command\Corp\MemberMedals.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Corp_MemberMedals test case.
 */
class EveLib_Ccp_Api_Command_Corp_MemberMedalsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Corp_MemberMedals
	 */
	private $EveLib_Ccp_Api_Command_Corp_MemberMedals;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MemberMedalsTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Corp_MemberMedals = new EveLib_Ccp_Api_Command_Corp_MemberMedals(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MemberMedalsTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Corp_MemberMedals = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MemberMedals->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MemberMedalsTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MemberMedals->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MemberMedals->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MemberMedalsTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MemberMedals->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MemberMedals->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MemberMedalsTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MemberMedals->set_cache_key(/* parameters */);
	
	}

}

