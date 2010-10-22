<?php 


class Tests_Zircote_Ccp_Api_Command_Map_SovereigntyStatus 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 * @see http://www.eveonline.com/ingameboard.asp?a=topic&threadID=1228297
 	 */
 	public function testFacWarSystems(){
 		$this->markTestSkipped('This API call is disabled');
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Map/SovereigntyStatus.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Map')
 			->SovereigntyStatus();
 	}
}