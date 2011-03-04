<?php

require_once 'library/EveLib/Ccp/Api/Command/Char/AssetList.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Char_AssetList test case.
 */
class EveLib_Ccp_Api_Command_Char_AssetListTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Char_AssetList
	 */
	private $EveLib_Ccp_Api_Command_Char_AssetList;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_AssetListTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Char_AssetList = new EveLib_Ccp_Api_Command_Char_AssetList(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_AssetListTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Char_AssetList = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_AssetList->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_AssetListTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_AssetList->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_AssetList->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_AssetListTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_AssetList->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_AssetList->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_AssetListTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_AssetList->set_cache_key(/* parameters */);
	
	}

}

