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

class EveLib_Ccp_Api_Result_Char_MailingListsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-12-02 06:29:32</currentTime>
  <result>
    <rowset name="mailingLists" key="listID" columns="listID,displayName">
      <row listID="128250439" displayName="EVETycoonMail" />
      <row listID="128783669" displayName="EveMarketScanner" />
      <row listID="141157801" displayName="Exploration Wormholes" />
    </rowset>
  </result>
  <cachedUntil>2009-12-02 12:29:32</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		//include_once 'EveLib/Ccp/Api/Result/Char/MailingLists.php';
 		$out = new EveLib_Ccp_Api_Result_Char_MailingLists($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('mailingLists', $out->result['result']);
		foreach (explode(',','listID,displayName') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['128250439']);
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['128783669']);
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['141157801']);
		}
 		$api = $out = null;
 	}
}