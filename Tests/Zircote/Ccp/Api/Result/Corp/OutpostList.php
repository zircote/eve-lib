<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_OutpostList 
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
 		require_once 'Zircote/Ccp/Api/Result/Corp/OutpostList.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_OutpostList($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
// 		print_r($out->result);
 	}
}