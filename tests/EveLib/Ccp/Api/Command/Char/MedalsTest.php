<?php

require_once 'library\EveLib\Ccp\Api\Command\Char\Medals.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Char_Medals test case.
 */
class EveLib_Ccp_Api_Command_Char_MedalsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Char_Medals
	 */
	private $EveLib_Ccp_Api_Command_Char_Medals;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MedalsTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Char_Medals = new EveLib_Ccp_Api_Command_Char_Medals(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MedalsTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Char_Medals = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_Medals->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MedalsTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_Medals->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_Medals->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MedalsTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_Medals->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_Medals->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MedalsTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_Medals->set_cache_key(/* parameters */);
	
	}

}

