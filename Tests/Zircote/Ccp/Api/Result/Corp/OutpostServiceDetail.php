<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_OutpostServiceDetail 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testOutpostServiceDetail(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api/Result/Corp/OutpostServiceDetail.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_OutpostServiceDetail($this->sharedFixture);
 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
//		foreach (explode(',','shareholderID,shareholderName,shares') as $row) {
//			$this->assertArrayHasKey($row, $out->result['result']['corporations']['5432132121']);
//		}
// 		print_r($out->result);
 	}
}