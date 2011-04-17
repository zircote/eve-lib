<?php

////include_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api test case.
 * @group EveLib_Ccp_Api
 */
class EveLib_Ccp_ApiTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @group EveLib_Ccp_Api
	 * @var EveLib_Ccp_Api
	 */
	private $EveLib_Ccp_Api;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_ApiTest::setUp()

		$this->EveLib_Ccp_Api;
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_ApiTest::tearDown()
		

		$this->EveLib_Ccp_Api = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Api->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );
		
		$this->EveLib_Ccp_Api->__construct(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getDsn()
	 */
	public function testGetDsn() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetDsn()
//		$this->markTestIncomplete ( "getDsn test not implemented" );
		$api = new EveLib_Ccp_Api(TESTS_EVELIB_DSN);
		$this->assertEquals(TESTS_EVELIB_DSN, $api->get_dsn());
	}
	
	/**
	 * Tests EveLib_Ccp_Api->set_dsn()
	 * 
	 */
	public function testSet_dsn() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSet_dsn()
		$api = new EveLib_Ccp_Api(TESTS_EVELIB_DSN);
		$api->set_dsn(TESTS_EVELIB_DSN);
		$this->assertEquals(TESTS_EVELIB_DSN, $api->get_dsn());
		$options = $api->get_options();
		$this->assertArrayHasKey('Api', $options);
		$this->assertArrayHasKey('Connection', $options);
		$this->assertArrayHasKey('protocol', $options['Connection']);
		$this->assertArrayHasKey('host', $options['Connection']);
		$this->assertArrayHasKey('port', $options['Connection']);
		$this->assertArrayHasKey('userID', $options['Api']);
		$this->assertArrayHasKey('apiKey', $options['Api']);
		$this->assertArrayHasKey('characterID', $options['Api']);
		$this->assertEquals($options['Connection']['protocol'],'http');
		$this->assertEquals($options['Connection']['host'],'api-test.eve-online.com');
		$this->assertEquals($options['Connection']['port'],'80');
		$this->assertEquals($options['Api']['userID'],'userID');
		$this->assertEquals($options['Api']['apiKey'],'apiKey');
		$this->assertEquals($options['Api']['characterID'],'characterID');
		$api = null;
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setOptions()
	 */
	public function testSetOptions() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetOptions()
		$this->markTestIncomplete ( "setOptions test not implemented" );
		
		$this->EveLib_Ccp_Api->setOptions(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setOption()
	 */
	public function testSetOption() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetOption()
		$this->markTestIncomplete ( "setOption test not implemented" );
		
		$this->EveLib_Ccp_Api->setOption(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setConnection()
	 */
	public function testSetConnection() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetConnection()
		$this->markTestIncomplete ( "setConnection test not implemented" );
		
		$this->EveLib_Ccp_Api->setConnection(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getConnection()
	 */
	public function testGetConnection() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetConnection()
		$this->markTestIncomplete ( "getConnection test not implemented" );
		
		$this->EveLib_Ccp_Api->getConnection(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setApi()
	 */
	public function testSetApi() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetApi()
		$this->markTestIncomplete ( "setApi test not implemented" );
		
		$this->EveLib_Ccp_Api->setApi(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getApi()
	 */
	public function testGetApi() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetApi()
		$this->markTestIncomplete ( "getApi test not implemented" );
		
		$this->EveLib_Ccp_Api->getApi(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->get_options()
	 */
	public function testGet_options() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGet_options()
		$this->markTestIncomplete ( "get_options test not implemented" );
		
		$this->EveLib_Ccp_Api->get_options(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getCache()
	 */
	public function testGetCache() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetCache()
		$this->markTestIncomplete ( "getCache test not implemented" );
		
		$this->EveLib_Ccp_Api->getCache(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setCache()
	 */
	public function testSetCache() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetCache()
		$this->markTestIncomplete ( "setCache test not implemented" );
		
		$this->EveLib_Ccp_Api->setCache(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getCommands()
	 */
	public function testGetCommands() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetCommands()
		$this->markTestIncomplete ( "getCommands test not implemented" );
		
		$this->EveLib_Ccp_Api->getCommands(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->setScope()
	 */
	public function testSetScope() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testSetScope()
		$this->markTestIncomplete ( "setScope test not implemented" );
		
		$this->EveLib_Ccp_Api->setScope(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getScope()
	 */
	public function testGetScope() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetScope()
		$this->markTestIncomplete ( "getScope test not implemented" );
		
		$this->EveLib_Ccp_Api->getScope(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->getCommand()
	 */
	public function testGetCommand() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->testGetCommand()
		$this->markTestIncomplete ( "getCommand test not implemented" );
		
		$this->EveLib_Ccp_Api->getCommand(/* parameters */);
	
	}
	
	/**
	 * Tests EveLib_Ccp_Api->__call()
	 */
	public function test__call() {
		// TODO Auto-generated EveLib_Ccp_ApiTest->test__call()
		$this->markTestIncomplete ( "__call test not implemented" );
		
		$this->EveLib_Ccp_Api->__call(/* parameters */);
	
	}

}

