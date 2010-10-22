<?php 


class Tests_Zircote_Ccp_Api_Command_Char_Notifications
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2010-04-16 20:16:57</currentTime>
  <result>
    <rowset name="notifications" key="notificationID" columns="notificationID,typeID,senderID,sentDate,read">
      <row notificationID="304084087" typeID="16" senderID="797400947" sentDate="2010-04-12 12:32:00" read="0"/>
      <row notificationID="303795523" typeID="16" senderID="671216635" sentDate="2010-04-09 18:04:00" read="1"/>
    </rowset>
  </result>
  <cachedUntil>2010-04-16 20:46:57</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/Notifications.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->Notifications();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('notifications', $out->result['result']);
 		$api = $out = null;
 	}
}