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

class Zircote_Ccp_Api_Result_Char_MailMessagesTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-12-02 00:46:10</currentTime>
  <result>
    <rowset name="mailMessages" key="messageID" 
    columns="messageID,senderID,sentDate,title,toCorpOrAllianceID,toCharacterIDs,toListIDs,read">
      <row messageID="290285276" senderID="999999999" sentDate="2009-12-01 01:04:00" title="Corp mail" toCorpOrAllianceID="999999999" toCharacterIDs="" toListIDs="" read="1" />
      <row messageID="290285275" senderID="999999999" sentDate="2009-12-01 01:04:00" title="Personal mail" toCorpOrAllianceID="" toCharacterIDs="999999999" toListIDs="" read="1" />
      <row messageID="290285274" senderID="999999999" sentDate="2009-12-01 01:04:00" title="Message to mailing list" toCorpOrAllianceID="" toCharacterIDs="" toListIDs="999999999" read="0" />
    </rowset>
  </result>
  <cachedUntil>2009-12-02 01:16:10</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/MailMessages.php';
 		$out = new Zircote_Ccp_Api_Result_Char_MailMessages($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('mailMessages', $out->result['result']);
		foreach (explode(',','messageID,senderID,sentDate,title,toCorpOrAllianceID,toCharacterIDs,toListIDs,read') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['mailMessages']['290285276']);
			$this->assertArrayHasKey($row, $out->result['result']['mailMessages']['290285275']);
			$this->assertArrayHasKey($row, $out->result['result']['mailMessages']['290285274']);
		}
 		$api = $out = null;
 	}
}