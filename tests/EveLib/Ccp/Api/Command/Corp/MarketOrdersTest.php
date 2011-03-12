<?php

require_once 'EveLib/Ccp/Api/Command/Corp/MarketOrders.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Corp_MarketOrders test case.
 */
class EveLib_Ccp_Api_Command_Corp_MarketOrdersTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Corp_MarketOrders
	 */
	private $EveLib_Ccp_Api_Command_Corp_MarketOrders;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MarketOrdersTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Corp_MarketOrders = new EveLib_Ccp_Api_Command_Corp_MarketOrders(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MarketOrdersTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Corp_MarketOrders = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MarketOrders->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MarketOrdersTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MarketOrders->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MarketOrders->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MarketOrdersTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MarketOrders->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Corp_MarketOrders->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Corp_MarketOrdersTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Corp_MarketOrders->set_cache_key(/* parameters */);
	
	}

}

