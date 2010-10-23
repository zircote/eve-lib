<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_ContactList 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2010-05-29 22:35:46</currentTime>
  <result>
    <rowset name="corporateContactList" key="contactID" columns="contactID,contactName,standing">
      <row contactID="797400947" contactName="CCP Garthagk" standing="-10" />
    </rowset>
    <rowset name="allianceContactList" key="contactID" columns="contactID,contactName,standing">
      <row contactID="797400947" contactName="CCP Garthagk" standing="5" />
    </rowset>
  </result>
  <cachedUntil>2010-05-29 22:50:46</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testContactList(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/ContactList.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_ContactList($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporateContactList', $out->result['result']);
		foreach (explode(',','contactID,contactName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['corporateContactList']['797400947']);
			$this->assertArrayHasKey($row, $out->result['result']['allianceContactList']['797400947']);
		}
 	}
}