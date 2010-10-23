<?php 


class Tests_Zircote_Ccp_Api_Result_Char_MailBodies
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-10-05 21:31:58</currentTime>
  <result>
    <rowset name="messages" key="messageID" columns="messageID,body">
      <message messageID="297113059" body="Hi.&lt;br&gt;&lt;br&gt;This is a message.&lt;br&gt;&lt;br&gt;" />
      <message messageID="297023208" body="&lt;p&gt;Another message" />
    </rowset>
    <missingMessageIDs>297023210,297023211</missingMessageIDs>
  </result>
  <cachedUntil>2020-10-02 21:31:58</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/MailBodies.php';
 		$out = new Zircote_Ccp_Api_Result_Char_MailBodies($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('messages', $out->result['result']);
		$this->assertArrayHasKey('missingMessageIDs', $out->result['result']);
		foreach (explode(',','messageID,body') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['messages']['297113059']);
			$this->assertArrayHasKey($row, $out->result['result']['messages']['297023208']);
		}
 		$api = $out = null;
 	}
}