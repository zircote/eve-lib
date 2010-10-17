<?php 


class Tests_Zircote_Ccp_Api_Command_Eve_OutpostList 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testOutpostList(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Map/OutpostList.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->OutpostList();
// 		print_r($out->result);
 	}
}