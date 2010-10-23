<?php 


class Tests_Zircote_Ccp_Api_Result_Account_AccountStatus 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-10-05 20:28:55</currentTime>
  <result>
    <userID>3000000</userID>
    <paidUntil>2011-01-01 00:00:00</paidUntil>
    <createDate>2004-01-01 00:00:00</createDate>
    <logonCount>9999</logonCount>
    <logonMinutes>9999</logonMinutes>
    <rowset name="Offers" key="offerID" columns="offerID,offeredDate,from,to,ISK" />
  </result>
  <cachedUntil>2010-10-05 20:33:55</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAllianceList(){
 		require_once 'Zircote/Ccp/Api/Result/Account/AccountStatus.php';
 		$out = new Zircote_Ccp_Api_Result_Account_AccountStatus($this->sharedFixture);
 		print_r($out->result);
 		
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('userID', $out->result['result']);
		$this->assertArrayHasKey('paidUntil', $out->result['result']);
		$this->assertArrayHasKey('createDate', $out->result['result']);
		$this->assertArrayHasKey('logonCount', $out->result['result']);
		$this->assertArrayHasKey('logonMinutes', $out->result['result']);
//		foreach (explode(',', 'offerID,offeredDate,from,to,ISK') as $item){
//			$this->assertArrayHasKey($item, $out->result['result']['Offers']);
//		}
 		$api = $out = null;
 	}
}