<?php

require_once 'EveLib/Ccp/Api/Command/Char/MailingLists.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api_Command_Char_MailingLists test case.
 */
class EveLib_Ccp_Api_Command_Char_MailingListsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Api_Command_Char_MailingLists
	 */
	private $EveLib_Ccp_Api_Command_Char_MailingLists;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MailingListsTest::setUp()
		

		$this->EveLib_Ccp_Api_Command_Char_MailingLists = new EveLib_Ccp_Api_Command_Char_MailingLists(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MailingListsTest::tearDown()
		

		$this->EveLib_Ccp_Api_Command_Char_MailingLists = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_MailingLists->_parseResponse()
	 */
	public function test_parseResponse() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MailingListsTest->test_parseResponse()
		$this->markTestIncomplete ( "_parseResponse test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_MailingLists->_parseResponse(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_MailingLists->_getRequest()
	 */
	public function test_getRequest() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MailingListsTest->test_getRequest()
		$this->markTestIncomplete ( "_getRequest test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_MailingLists->_getRequest(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api_Command_Char_MailingLists->set_cache_key()
	 */
	public function testSet_cache_key() {
		// TODO Auto-generated EveLib_Ccp_Api_Command_Char_MailingListsTest->testSet_cache_key()
		$this->markTestIncomplete ( "set_cache_key test not implemented" );
		
		$this->EveLib_Ccp_Api_Command_Char_MailingLists->set_cache_key(/* parameters */);
	
	}

}
