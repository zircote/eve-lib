<?php 


class Tests_Zircote_Ccp_Api_Command_Char_ContactNotification
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2010-05-29 23:04:28</currentTime>
  <result>
    <rowset name="contactNotifications" key="notificationID" columns="notificationID,senderID,senderName,sentDate,messageData">
      <row notificationID="308734131" senderID="797400947" senderName="CCP Garthagk" sentDate="2010-05-29 23:04:00" 
messageData="level: 10&#xA;message: Hi, I want to social network with you!&#xA;" />
    </rowset>
  </result>
  <cachedUntil>2010-05-30 05:04:28</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 * @see http://wiki.eve-id.net/APIv2_Char_Notifications_XML
 	 * @see http://wiki.eve-id.net/APIv2_Char_ContactNotifications_XML
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/ContactNotification.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->ContactNotification();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('contactNotifications', $out->result['result']);
 		$api = $out = null;
 	}
}