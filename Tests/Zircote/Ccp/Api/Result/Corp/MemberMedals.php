<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_MemberMedals 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-05-03 22:52:26</currentTime>
  <result>
    <rowset name="issuedMedals" key="medalID" columns="medalID,characterID,reason,status,issuerID,issued">
      <row medalID="24216" characterID="1302462525" reason="Its True" status="public" issuerID="1824523597" issued="2009-05-03 03:03:55" />
    </rowset>
  </result>
  <cachedUntil>2009-05-04 21:52:26</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMemberMedals(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberMedals.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_MemberMedals($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('issuedMedals', $out->result['result']);
		foreach (explode(',','medalID,characterID,reason,status,issuerID,issued') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['issuedMedals']['24216']);
		}
// 		print_r($out->result);
 	}
}