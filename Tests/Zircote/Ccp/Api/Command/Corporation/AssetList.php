<?php 


class Tests_Zircote_Ccp_Api_Command_Corporation_AssetList 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAssetList(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corporation/AssetList.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->AssetList();
// 		print_r($out->result);
 	}
}