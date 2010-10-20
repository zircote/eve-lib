<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_ContactList 
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
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/ContactList.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->ContactList();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporateContactList', $out->result['result']);
// 		print_r($out->result);
 	}
}