<?php 
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class EveLib_Ccp_Api_Result_Char_MailBodiesTest
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
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		//include_once 'EveLib/Ccp/Api/Result/Char/MailBodies.php';
 		$out = new EveLib_Ccp_Api_Result_Char_MailBodies($this->sharedFixture);
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