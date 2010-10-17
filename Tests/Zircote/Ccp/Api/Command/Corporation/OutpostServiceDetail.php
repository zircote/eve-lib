<?php 


class Tests_Zircote_Ccp_Api_Command_Eve_AllianceList 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAllianceList(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Eve/AllianceList.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->AllianceList();
// 		print_r($out->result);
 	}
}