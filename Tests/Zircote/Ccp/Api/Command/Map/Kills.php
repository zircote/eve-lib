<?php 


class Tests_Zircote_Ccp_Api_Command_Map_FacWarSystems 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
			
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testFacWarSystems(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Eve/FacWarSystems.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Map')
 			->FacWarSystems();
// 		print_r($out->result);
 	}
}