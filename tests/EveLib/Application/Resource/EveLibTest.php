<?php

////include_once 'EveLib/Application/Resource/EveLib.php';
//
////include_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Application_Resource_EveLib test case.
 */
class EveLib_Application_Resource_EveLibTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Application_Resource_EveLib
	 */
	private $EveLib_Application_Resource_EveLib;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Application_Resource_EveLibTest::setUp()
		

		$this->EveLib_Application_Resource_EveLib = new EveLib_Application_Resource_EveLib(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Application_Resource_EveLibTest::tearDown()
		

		$this->EveLib_Application_Resource_EveLib = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

 	/**
 	 * @group EveLib_Application_Resource_EveLib
 	 */
	public function test_buildDsnFromArray(){
		$config_array = array(
			array(
				'Connection' => array (
					'host' => 'api.eve-online.com',
					'port' => '80',
					'schema' => 'http'
				),
				'Api' => array(
					'userID' => '654321',
					'apiKey' => 'abc123XYZ',
					'characterID' => '123456'
				)
			)
		);
		$expected = 'http://654321:abc123XYZ@api.eve-online.com:80/123456';
		$method = new ReflectionMethod(
          'EveLib_Application_Resource_EveLib', '_buildDsnFromArray'
        );
        $method->setAccessible(TRUE);
		$this->assertEquals($expected, $method
			->invokeArgs(new EveLib_Application_Resource_EveLib, $config_array), 
			'DSN did not match expected');
	}
}

