<?php 


class Tests_Zircote_Ccp_Api_Result_Char_ContactList
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2010-05-29 22:35:46</currentTime>
  <result>
    <rowset name="contactList" key="contactID" columns="contactID,contactName,inWatchlist,standing">
      <row contactID="3010913" contactName="Hirento Raikkanen" inWatchlist="False" standing="0" />
      <row contactID="797400947" contactName="CCP Garthagk" inWatchlist="True" standing="10" />
    </rowset>
  </result>
  <cachedUntil>2010-05-29 22:50:46</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/ContactList.php';
 		$out = new Zircote_Ccp_Api_Result_Char_ContactList($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('contactList', $out->result['result']);
		foreach (explode(',','contactID,contactName,inWatchlist,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['contactList']['3010913']);
			$this->assertArrayHasKey($row, $out->result['result']['contactList']['797400947']);
		}
 		$api = $out = null;
 	}
}