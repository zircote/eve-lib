<?php

require_once 'library\EveLib\Ccp\Api\Command\Char\IndustryJobs.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Char_IndustryJobs test case.
 */
class EveLib_Ccp_Api_Command_Char_IndustryJobsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Char_IndustryJobs
	 */
	private $EveLib_Ccp_Api_Command_Char_IndustryJobs;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_IndustryJobsTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Char_IndustryJobs = new EveLib_Ccp_Api_Command_Char_IndustryJobs(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_IndustryJobsTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Char_IndustryJobs = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_IndustryJobs->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_IndustryJobsTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_IndustryJobs->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_IndustryJobs->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_IndustryJobsTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_IndustryJobs->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_IndustryJobs->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_IndustryJobsTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_IndustryJobs->set_cache_key(/* parameters */);
	
	}

}

