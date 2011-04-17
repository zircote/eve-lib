<?php

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Data_Char_Notifications test case.
 */
class EveLib_Ccp_Data_Char_NotificationsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var EveLib_Ccp_Data_Char_Notifications
	 */
	private $EveLib_Ccp_Data_Char_Notifications;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated EveLib_Ccp_Data_Char_NotificationsTest::setUp()
		

		$this->EveLib_Ccp_Data_Char_Notifications = new EveLib_Ccp_Data_Char_Notifications;
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EveLib_Ccp_Data_Char_NotificationsTest::tearDown()
		

		$this->EveLib_Ccp_Data_Char_Notifications = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests EveLib_Ccp_Data_Char_Notifications->getNotificationType()
	 */
	public function testGetNotificationType() {
		// TODO Auto-generated EveLib_Ccp_Data_Char_NotificationsTest->testGetNotificationType()
		$this->markTestIncomplete ( "getNotificationType test not implemented" );
		
		$this->EveLib_Ccp_Data_Char_Notifications->getNotificationType(/* parameters */);
	
	}
	
	/**
	 * @group parseTest
	 * Tests EveLib_Ccp_Data_Char_Notifications->parse76()
	 */
	public function testParse() {
		$this->markTestIncomplete ( "getNotificationType test not implemented" );
		include  realpath(dirname(__FILE__)) . '/__files/notifications.php';
		foreach ($type as $typeID => $t) {
			try{
				$this->assertTrue(count($this->EveLib_Ccp_Data_Char_Notifications->parse($t)));
			} catch (Exception $e){
				echo $typeID, '::',$e->getMessage(), PHP_EOL;
				echo $t, PHP_EOL;
				exit;
			}
		}
	}

}

