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

class EveLib_Ccp_Api_Result_Char_ContactListTest
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
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'EveLib/Ccp/Api.php';
 		require_once 'EveLib/Ccp/Api/Result/Char/ContactList.php';
 		$out = new EveLib_Ccp_Api_Result_Char_ContactList($this->sharedFixture);
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