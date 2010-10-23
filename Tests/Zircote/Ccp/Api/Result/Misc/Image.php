<?php 


class Tests_Zircote_Ccp_Api_Command_Misc_Image 
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
 		require_once 'Zircote/Ccp/Api/Result/Misc/Image.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Misc')
 			->Image();
// 		print_r($out->result);
 	}
}