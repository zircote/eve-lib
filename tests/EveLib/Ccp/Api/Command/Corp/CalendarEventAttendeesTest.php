<?php

require_once 'library\EveLib\Ccp\Api\Command\Corp\CorporationSheet.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Corp_CorporationSheet test case.
 */
class EveLib_Ccp_Api_Command_Corp_CorporationSheetTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Corp_CorporationSheet
	 */
	private $EveLib_Ccp_Api_Command_Corp_CorporationSheet;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_CorporationSheetTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Corp_CorporationSheet = new EveLib_Ccp_Api_Command_Corp_CorporationSheet(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_CorporationSheetTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Corp_CorporationSheet = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_CorporationSheet->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_CorporationSheetTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_CorporationSheet->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_CorporationSheet->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_CorporationSheetTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_CorporationSheet->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_CorporationSheet->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_CorporationSheetTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_CorporationSheet->set_cache_key(/* parameters */);
	
	}

}

